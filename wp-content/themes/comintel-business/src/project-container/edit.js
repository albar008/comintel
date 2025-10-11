import { includes as _includes, set } from "lodash";
import { useEffect } from "@wordpress/element";
import { createBlock } from "@wordpress/blocks";
import { addQueryArgs } from "@wordpress/url";
import { useSelect, useDispatch } from "@wordpress/data";
import apiFetch from "@wordpress/api-fetch";
import { Button } from "@wordpress/components";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";

export default function Edit({ attributes, setAttributes, clientId }) {
  const blockProps = useBlockProps();
  const { insertBlock } = useDispatch("core/block-editor");
  const { lockPostSaving, unlockPostSaving } = useDispatch("core/editor");
  const { createErrorNotice } = useDispatch("core/notices");

  const postId = useSelect((select) => {
    return select("core/editor").getCurrentPostId();
  }, []);

  const block = useSelect((select) => {
    return select("core/block-editor").getBlock(clientId);
  }, []);

  const _addProject = () => {
    insertBlock(
      createBlock("comintel-business-component/project-list", {
        project: "",
      }),
      block.innerBlocks.length,
      clientId
    );
  };

  const _setProjectOptions = (projects) => {
    const innerProjectAttr = block.innerBlocks?.map(
      (innerBlock) => innerBlock.attributes.project
    );
    const newProjects = projects?.map((project) => {
      const isSelected = project?.value
        ? _includes(innerProjectAttr, project.value + "")
        : false;
      return {
        ...project,
        disabled: !!isSelected,
      };
    });
    setAttributes({
      projects: newProjects,
    });
  };

  useEffect(() => {
    const innerProjectAttr = block.innerBlocks?.map(
      (innerBlock) => innerBlock.attributes.project
    );
    _setProjectOptions(attributes.projects);
    if (innerProjectAttr?.length === 0 || (innerProjectAttr?.length > 0 && !innerProjectAttr.includes(""))) {
      unlockPostSaving("projectlock");
    } else {
      lockPostSaving("projectlock");
      createErrorNotice(
        "Please select at least one project. You can't save this post until you select a project or remove it.",
        {
          type: "snackbar",
          icon: "‼️",
          isDismissible: true,
          id: "project-error-notice",
        }
      );
    }
  }, [block.innerBlocks]);

  // Fetch project data
  useEffect(() => {
    (async () => {
      const response = await apiFetch({
        path: addQueryArgs(`/project/v1/show-projects`, {
          curr_post_id: postId,
        }),
      });
      const projectsData = response.results?.map((project) => {
        return {
          value: project.id,
          label: project.title,
        };
      });
      _setProjectOptions(
        [{ value: "", label: "Select Project" }].concat(projectsData)
      );
    })();
  }, [postId]);

  return (
    <div {...blockProps}>
      <InnerBlocks renderAppender={false} />
      <Button
        disabled={block.innerBlocks.length >= 6}
        variant="primary"
        onClick={_addProject}
      >
        Tambah Referensi Project
      </Button>
    </div>
  );
}
