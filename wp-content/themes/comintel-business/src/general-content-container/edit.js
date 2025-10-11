import { useEffect } from "@wordpress/element";
import apiFetch from "@wordpress/api-fetch";
import { PanelBody, PanelRow, Button } from "@wordpress/components";
import {
  useBlockProps,
  useInnerBlocksProps,
  InspectorControls,
  MediaUploadCheck,
  MediaUpload,
} from "@wordpress/block-editor";
import clsx from "clsx";

export default function Edit({ attributes, setAttributes }) {
  const containerCls = clsx({
    "section-container": true,
    "position-relative": attributes?.bgImgId
  });
  const blockProps = useBlockProps({
    className: containerCls
  });
  const innerBlockContainerCls = clsx("row", attributes?.className);
  const { children, ...innerBlocksProps } = useInnerBlocksProps({
    className: innerBlockContainerCls,
  });

  const onFileSelect = (_fileSelected) => {
    setAttributes({ bgImgId: _fileSelected.id });
  };

  useEffect(() => {
    (async function () {
      if (attributes?.bgImgId) {
        try {
          const response = await apiFetch({
            path: "/wp/v2/media/" + attributes.bgImgId,
          });
          setAttributes({
            bgImgUrlLarge: response?.media_details?.sizes?.large?.source_url,
            bgImgUrlThumb:
              response?.media_details?.sizes?.thumbnail?.source_url,
          });
        } catch (error) {
          console.log("ERROR", error);
        } finally {
          setAttributes({
            backgroundColor: null
          })
        }
      }
    })();
  }, [attributes?.bgImgId]);

  useEffect(() => {
    if(attributes?.backgroundColor) {
      setAttributes({
        bgImgId: null,
        bgImgUrlLarge: null,
        bgImgUrlThumb: null,
      })
    }
  }, [attributes?.backgroundColor])

  return (
    <>
      <InspectorControls>
        <PanelBody title="Background Image">
          {attributes?.bgImgId && (
            <PanelRow>
              <div style={{
                display: 'flex',
                alignItems: 'flex-start'
              }}>
                <img
                  src={attributes?.bgImgUrlThumb}
                  width={150}
                  height={150}
                  alt="bg image thumb"
                />
                <Button
                  icon="trash"
                  label="Delete Background"
                  isDestructive
                  onClick={() => {
                    setAttributes({
                      bgImgId: undefined,
                      bgImgUrlLarge: undefined,
                      bgImgUrlThumb: undefined,
                    });
                  }}
                />
              </div>
            </PanelRow>
          )}
          <PanelRow>
            <MediaUploadCheck>
              <MediaUpload
                onSelect={onFileSelect}
                value={attributes?.bgImgId}
                render={({ open }) => (
                  <Button variant="primary" onClick={open}>
                    Select Background
                  </Button>
                )}
              />
            </MediaUploadCheck>
          </PanelRow>
        </PanelBody>
      </InspectorControls>
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
              zIndex: 0
            }}
          ></div>
        )}
        <div className="container">
          <div {...innerBlocksProps}>{children}</div>
        </div>
      </section>
    </>
  );
}
