
const {select, subscribe} = wp.data;

function showTocHeadingBlockToInserter( settings, name ) {
	
  const blockAlbToc = select('core/block-editor').getBlocks();
  console.log("KOAIRA", blockAlbToc, name);

	return settings;
}

wp.hooks.addFilter(
	'blocks.registerBlockType',
	'alb/alb-toc/show-toc-heading-block-to-inserter',
	showTocHeadingBlockToInserter
);