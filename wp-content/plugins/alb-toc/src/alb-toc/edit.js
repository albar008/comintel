import "./editor.scss";
import { useCallback, useEffect, useState } from "react";
import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";
import { useSelect, useDispatch, select } from "@wordpress/data";
import { isEmpty as _isEmpty, split as _split } from "lodash";

export default function Edit({ attributes, setAttributes, clientId }) {
	const { moveBlockToPosition } = useDispatch("core/block-editor");
	const [localTocList, setLocalTocList] = useState("");

	const _parseBlockHead = (block) => {
		return {
			content: block.attributes.content?.text,
			level: block.attributes.level,
			atPage: block.attributes.atPage,
			tocId: block.attributes.tocId,
			children: [],
		};
	};

	const _recursiveFormattedChildren = (block, _lastItem) => {
		if (
			_lastItem.children.length > 0 &&
			block.attributes.level >
				_lastItem.children[_lastItem.children.length - 1].level
		) {
			_lastItem.children[_lastItem.children.length - 1] =
				_recursiveFormattedChildren(
					block,
					_lastItem.children[_lastItem.children.length - 1],
				);
		} else {
			_lastItem.children.push(_parseBlockHead(block));
		}
		return _lastItem;
	};

	const _formatDataForInnerTemplate = useCallback(
		(_allHeadings) => {
			const _formatedInnerData = [];
			_allHeadings.forEach((block) => {
				if (
					_formatedInnerData.length > 0 &&
					block.attributes.level >
						_formatedInnerData[_formatedInnerData.length - 1].level
				) {
					_formatedInnerData[_formatedInnerData.length - 1] =
						_recursiveFormattedChildren(
							block,
							_formatedInnerData[_formatedInnerData.length - 1],
						);
				} else {
					_formatedInnerData.push(_parseBlockHead(block));
				}
			});
			return _formatedInnerData;
		},
		[clientId],
	);

	const _filterHeadingBlocks = (allNeededBlocks) => {
		const filteredHeadings = [];
		const pageBlocks = [];
		allNeededBlocks.forEach((block, idx) => {
			if (block.name === "core/nextpage") {
				pageBlocks.push(block);
			} else if (block.name === "alb/alb-toc-heading") {
				const blockTocId = _split(block?.clientId, "-", 1)[0];
				block.attributes.tocId = `alb-toc-${blockTocId}`;
				block.attributes.atPage = pageBlocks?.length + 1;
				filteredHeadings.push(block);
			}
		});
		return filteredHeadings;
	};

	const headingBlocks = useSelect(
		(select) => {
			const { getBlock, getBlocksByName } = select("core/block-editor");
			const headingsIds = getBlocksByName([
				"alb/alb-toc-heading",
				"core/nextpage",
			]);
			const allNeededBlocks = headingsIds?.map((_headingId) => {
				return getBlock(_headingId);
			});
			console.info("All Alb Toc Blocks", allNeededBlocks);
			const headingBlocksFiltered = _filterHeadingBlocks(allNeededBlocks);
			const formatedDataForInnerTemplate = _formatDataForInnerTemplate(
				headingBlocksFiltered,
			);
			console.info("Formatted Inner Template", formatedDataForInnerTemplate);
			return { headingsIds, formatedDataForInnerTemplate };
		},
		[clientId],
	);

	useEffect(() => {
		setLocalTocList(JSON.stringify(headingBlocks.formatedDataForInnerTemplate));
	}, [headingBlocks.formatedDataForInnerTemplate]);

	useEffect(() => {
		setAttributes({ tocList: localTocList });
	}, [localTocList]);

	useEffect(() => {
		setTimeout(() => {
			moveBlockToPosition(clientId, "", "", 0);
		}, 500);
	}, [clientId]);

	const _renderChildren = (_children) => {
		return (
			<ul>
				{_children?.map((_item) => (
					<li>
						{_item?.content}
						{!_isEmpty(_item?.children) ? _renderChildren(_item?.children) : ""}
					</li>
				))}
			</ul>
		);
	};

	const _getListContent = useCallback(() => {
		const dataTemplate = headingBlocks.formatedDataForInnerTemplate;
		
		if(_isEmpty(dataTemplate)){
			return (
				<div class='not-heading-blocks-wrapper'>
					<p>There are not any <strong>Alb Toc Heading</strong> blocks. Please Insert Block <strong>Alb Toc Heading</strong></p>
				</div>
			)
		}
		
		return (
			<ul>
				{dataTemplate?.map((_item) => (
					<li>
						{_item?.content}
						{!_isEmpty(_item?.children) ? _renderChildren(_item?.children) : ""}
					</li>
				))}
			</ul>
		);
	}, [headingBlocks.formatedDataForInnerTemplate]);

	const blockProps = useBlockProps({
		className: 'alb-toc-wrapper'
	});

	return (
		<section {...blockProps}>
			<RichText
				tagName="h3"
				allowedFormats={[]}
				value={attributes?.tocTitle}
				onChange={(_text) => {
					setAttributes({ tocTitle: _text });
				}}
			/>
			{_getListContent()}
		</section>
	);
}
