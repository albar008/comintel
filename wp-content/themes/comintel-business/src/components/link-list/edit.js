import { useBlockProps, RichText, InnerBlocks } from "@wordpress/block-editor";
import { useSelect } from '@wordpress/data';

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps({className: attributes?.className});
  console.log("JONI", blockProps)

  return (
    <div {...blockProps}>
      <RichText
        onChange={(_text) => setAttributes({ listTitle: _text })}
        value={attributes?.listTitle}
        style={{ fontFamily: "Unna, serif" }}
        className="fs-4 fw-bold"
        tagName="h3"
      />
      <ul className="list-unstyled">
        <InnerBlocks
          allowedBlocks={["comintel-business-component/link-list-item"]}
          templateLock={false}
        />
      </ul>
    </div>
  );
}
