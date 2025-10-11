import { Fragment } from '@wordpress/element';
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import clsx from "clsx";

export default function Save({ attributes }) {
  const blockProps = useBlockProps.save();
  return (
    <Fragment {...blockProps}>
      <InnerBlocks.Content />
    </Fragment>
  );
}
