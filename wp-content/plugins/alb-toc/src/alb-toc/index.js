/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from "@wordpress/blocks";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./style.scss";

/**
 * Internal dependencies
 */
import Edit from "./edit";
import save from "./save";
import metadata from "./block.json";
import { split as _split, has } from "lodash";

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType(metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,
	save,
});

// const withTocIdAttribute = createHigherOrderComponent((BlockEdit) => {
// 	return (props) => {
// 		if (props.name !== "core/heading") {
// 			return <BlockEdit {...props} />;
// 		}

// 		props.attributes.className = '';

// 		console.log("Block Edit", props, props.name);

// 		const hasToc = select("core/block-editor").getBlocksByName("alb/alb-toc");
// 		console.log("hasToc", hasToc, hasToc?.length);

// 		return <BlockEdit {...props} />;
// 	};
// }, "withTocIdAttribute");

// addFilter(
// 	"editor.BlockEdit",
// 	"alb/alb-toc/heading-add-toc-id",
// 	withTocIdAttribute
// );
