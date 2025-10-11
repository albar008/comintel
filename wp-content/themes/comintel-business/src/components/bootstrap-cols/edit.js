import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();
  const containerCls = clsx(attributes?.className);
  const { children, ...innerBlocksProps } = useInnerBlocksProps(blockProps, {
    className: containerCls
  });
  return (
    <div {...innerBlocksProps}>
      {children}
    </div>
  );
}
