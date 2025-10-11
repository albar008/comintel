import {registerBlockType} from '@wordpress/blocks';
import { RichText } from "@wordpress/block-editor";
import metadata from './block.json';
import Edit from './edit';

registerBlockType(metadata.name, {  
  edit: Edit
});