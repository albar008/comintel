import { useDispatch } from "@wordpress/data";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import { Flex, FlexItem, FlexBlock, Button } from "@wordpress/components";
import clsx from "clsx";
import ProjectList from "./components/projectList";

export default function Edit({ attributes, setAttributes, context, clientId }) {
  const blockProps = useBlockProps();
  const { removeBlock } = useDispatch("core/block-editor");
  console.log("ProjectList Edit", attributes, context);
  const _onRemove = () => {
    removeBlock(clientId, true);
  };
  return (
    <div {...blockProps}>
      <Flex>
        <FlexBlock>
          <ProjectList
            project={attributes.project}
            projectList={
              context["comintel-business/project-container/projects"]
            }
            onChange={(value) => setAttributes({ project: value })}
          />
        </FlexBlock>
        <FlexItem>
          <Button
            label="Remove"
            isDestructive
            icon={"trash"}
            onClick={_onRemove}
          />
        </FlexItem>
      </Flex>
    </div>
  );
}
