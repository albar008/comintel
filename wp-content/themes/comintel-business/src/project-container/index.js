import {registerBlockType} from '@wordpress/blocks';
import { InnerBlocks } from "@wordpress/block-editor";
import metadata from './block.json';
import Edit from './edit';
import save from './save';

registerBlockType(metadata.name, {  
  edit: Edit,
  save
});