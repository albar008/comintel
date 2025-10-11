import { useDispatch } from "@wordpress/data";
import {
  useBlockProps,
  RichText,
  InspectorControls,
} from "@wordpress/block-editor";
import { store as noticesStore } from "@wordpress/notices";
import { PanelBody, PanelRow, CheckboxControl } from "@wordpress/components";
import clsx from 'clsx';

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();
  const { createInfoNotice } = useDispatch(noticesStore);
  const headerCls = clsx(
    'section-header',
    {
      'section-header--center': attributes.isCentered,
    }
  );
  return (
    <div {...blockProps}>
      <InspectorControls>
        <PanelBody title="General Settings" initialOpen={true}>
          <PanelRow>
            <CheckboxControl
              __nextHasNoMarginBottom
              label="Is Centered ?"
              help="Is Header Centered ?"
              checked={attributes.isCentered}
              onChange={(isChecked) => {
                setAttributes({ isCentered: isChecked });
              }}
            />
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <header className={headerCls}>
        <RichText
          value={attributes.subtitle}
          onChange={(value) => setAttributes({ subtitle: value })}
          tabIndex="small"
          placeholder="Subtitle"
          className="fs-6 section-header__subtitle"
          disableLineBreaks
          allowedFormats={[]}
        />
        <RichText
          value={attributes.title}
          onChange={(value) => setAttributes({ title: value })}
          placeholder="Add a title"
          tagName="h2"
          className="section-header__title"
          style={{ fontFamily: "Unna, serif" }}
          disableLineBreaks
          allowedFormats={[]}
        />
      </header>
    </div>
  );
}
