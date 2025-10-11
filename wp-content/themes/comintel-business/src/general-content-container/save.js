import {
  useBlockProps,
  RichText,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import clsx from "clsx";

export default function Save({ attributes }) {
  const containerCls = clsx({
    "section-container": true,
    "position-relative": attributes?.bgImgId,
  });
  const blockProps = useBlockProps.save({
    className: containerCls,
  });
  const innerBlockContainerCls = clsx("row", attributes?.className);
  const { children, ...innerBlocksProps } = useInnerBlocksProps.save({
    className: innerBlockContainerCls,
  });
  return (
    <section {...blockProps}>
      {attributes?.bgImgId && (
        <div
          style={{
            width: "100%",
            height: "100%",
            position: "absolute",
            backgroundImage: `url(${attributes?.bgImgUrlLarge})`,
            backgroundSize: "cover",
            left: 0,
            top: 0,
            backgroundRepeat: "no-repeat",
            opacity: 0.3,
            zIndex: -1
          }}
        ></div>
      )}
      <div className="container">
        <div {...innerBlocksProps}>{children}</div>
      </div>
    </section>
  );
}
