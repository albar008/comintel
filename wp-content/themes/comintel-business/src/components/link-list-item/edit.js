import {
  useBlockProps,
  RichText,
  InspectorControls,
} from "@wordpress/block-editor";
import {
	TextControl,
	PanelBody,
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();
  return (
      <>
      <InspectorControls>
        <PanelBody title="Settings" initialOpen={true}>
          <TextControl
            label="Fontawesome Icon"
            value={attributes?.faIconName}
            onChange={(value) => setAttributes({ faIconName: value })}
          />
        </PanelBody>
      </InspectorControls>
      <li {...blockProps}>
        <RichText
          onChange={(_text) => setAttributes({ listText: _text })}
          value={attributes?.listText}
          allowedFormats={["core/link"]}
          tagName="span"
        />
      </li>
    </>
  );
}
