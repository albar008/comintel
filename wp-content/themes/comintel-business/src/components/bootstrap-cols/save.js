import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function Save({ attributes }) {
  const blockProps = useBlockProps.save();
  const containerCls = clsx(attributes?.className);
  const { children, ...innerBlocksProps } = useInnerBlocksProps.save(blockProps, {
    className: containerCls
  });
  return (
    <div {...innerBlocksProps}>
      {children}
    </div>
  );
}
