import { Fragment } from "@wordpress/element";
import { SelectControl } from "@wordpress/components";

export default function ProjectList({ projectList, project, onChange }) {
  return (
    <Fragment>
       <SelectControl
            options={projectList}
            label="Select Project"
            value={project}
            onChange={onChange}
          />
    </Fragment>
  );
}
