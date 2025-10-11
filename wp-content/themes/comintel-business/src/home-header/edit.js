import { useBlockProps, RichText } from "@wordpress/block-editor";

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <div id="hero">
        <div className="container pt-4 pt-xl-5">
          <div className="row pt-5">
            <div className="col-12 col-md-9 text-md-start">
              <div className="hero__content-container">
                <RichText
                  onChange={(_text) => setAttributes({ headerSubTitle: _text })}
                  value={attributes?.headerSubTitle}
                  tagName="small"
                  placeholder="Header Subtitle"
                  className="fs-5"
                />
                <RichText
                  onChange={(_text) => setAttributes({ headerTitle: _text })}
                  value={attributes?.headerTitle}
                  placeholder="Header Title"
                  tagName="h1"
                  className="hero__main-title"
                  style={{ fontFamily: "Unna, serif" }}
                />
                <RichText
                  onChange={(_text) => setAttributes({ headerDesc: _text })}
                  value={attributes?.headerDesc}
                  placeholder="Description"
                  tagName="p"
                />
                <a className="btn btn-secondary mt-3" role="button">
                  <RichText
                    onChange={(_text) => setAttributes({ headerCtaText: _text })}
                    value={attributes?.headerCtaText}
                    style={{ fontWeight: "normal !important" }}
                    tagName="span"
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
