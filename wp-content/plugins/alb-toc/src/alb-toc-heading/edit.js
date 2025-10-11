import "./editor.scss";
import { useCallback, useEffect, useState } from "react";
import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	RichText,
	BlockControls,
	HeadingLevelDropdown,
} from "@wordpress/block-editor";
import { toHTMLString } from "@wordpress/rich-text";
import { createBlock } from "@wordpress/blocks";
import { Notice, ToolbarGroup, Button } from "@wordpress/components";
import { useSelect, useDispatch, select } from "@wordpress/data";
import { isEmpty as _isEmpty, split as _split } from "lodash";

export default function Edit({ attributes, setAttributes, clientId }) {
	const { removeBlock, insertBlock } = useDispatch("core/block-editor");
	const albToc = useSelect(
		(select) => {
			const _block = select("core/block-editor").getBlocksByName("alb/alb-toc");
			return _block;
		},
		[clientId],
	);

	useEffect(() => {
		const blockTocHeadId = _split(clientId, "-", 1)[0];
		setAttributes({anchorId: blockTocHeadId})
	}, []);

	const _addToc = useCallback(() => {
		const tocBlock = createBlock('alb/alb-toc', {});
		insertBlock(tocBlock, 0, '');
	}, []);

	return (
		<section {...useBlockProps()}>
			{_isEmpty(albToc) ? (
				<Notice
					status="error"
					onRemove={() => {
						removeBlock(clientId);
					}}
				>
					TOC Block is not found. Dismis this notif will delete this heading &nbsp;
					<Button variant='secondary' onClick={_addToc} style={{backgroundColor: 'white'}}>Add TOC</Button>
				</Notice>
			) : (
				<>
					<BlockControls>
						<ToolbarGroup>
							<HeadingLevelDropdown
								value={attributes?.level}
								onChange={(lvl) => {
									setAttributes({ level: lvl })
									// console.log("Level", lvl, attributes?.content);
								}}
							/>
							{/* <ToolbarButton
								icon={"edit"}
								label="Edit"
								onClick={() => {
									// Check all available format types
									const { getFormatTypes } = select(richTextStore);

									const availableFormats = getFormatTypes();

									console.log("All Formats", availableFormats);
								}}
							/> */}
						</ToolbarGroup>
					</BlockControls>
					<RichText
						placeholder="TOC Heading"
						onChange={(text) => {
							console.log("TEXT", text);
							setAttributes({content: text})
						}}
						value={attributes?.content}
						identifier="content"
						tagName={`h${attributes?.level}`}
						allowedFormats={[
							"core/bold",
							"core/italic",
							"core/text-color",
							"core/code",
						]}
					/>
				</>
			)}
		</section>
	);
}
