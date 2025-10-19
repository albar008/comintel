import { useBlockProps, RichText, InnerBlocks } from "@wordpress/block-editor";

// const TEMPLATE = [
//   [
//     "core/columns",
//     {},
//     [
//       [
//         "core/column",
//         {},
//         [["core/paragraph", { placeholder: "Kolom kiri..." }]],
//       ],
//       [
//         "core/column",
//         {},
//         [["core/paragraph", { placeholder: "Kolom kanan..." }]],
//       ],
//     ],
//   ],
// ];

const TEMPLATE = [
  [
    "core/columns",
    {},
    [
      ["core/column", {}, [["comintel-business-component/link-list", {className: 'useful-links'}]],],
      // ["core/column", {}, [["comintel-business-component/link-list", {className: 'contact-info'}]],],
    ],
  ],
];

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();
  return (
    <footer {...blockProps}>
      <section className="section-container section-container--with-bg footer-top">
        <div className="container py-4 py-xl-5">
          <div className="row gy-3 row-cols-2">
            <div className="col-12 col-md-6">
              <div className="fw-bold d-flex align-items-center mb-2">
                <div>
                  <h3 className="text-muted">Footer Logo Here</h3>
                </div>
              </div>
              <RichText
                onChange={(_text) => setAttributes({ footerDesc: _text })}
                value={attributes?.footerDesc}
                className="text-muted"
                tagName="p"
              />
              <div className="mt-3">
                <small className="fs-5">Follow Us</small>
                <div>
                  <h6 className="text-muted">Social Media Links Here</h6>
                </div>
              </div>
            </div>

            <div className="col-12 col-md-3">
              <InnerBlocks
                template={TEMPLATE}
                orientation="horizontal" 
                // templateLock="all"
              />
            </div>

            <div className="col-12 col-md-3">
              <h6 className="text-muted">Contact Information</h6>
            </div>
          </div>
        </div>
      </section>
      <section className="footer-bottom">
        <div className="container">
          <div className="py-4">
            <RichText
                onChange={(_text) => setAttributes({ footerCopyright: _text })}
                value={attributes?.footerCopyright}
                tagName="p"
              />
          </div>
        </div>
      </section>
    </footer>
  );
}
