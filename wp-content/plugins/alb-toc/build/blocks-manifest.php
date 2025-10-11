<?php
// This file is generated. Do not modify it manually.
return array(
	'alb-toc' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'alb/alb-toc',
		'version' => '0.1.0',
		'title' => 'Alb Toc',
		'category' => 'alb',
		'icon' => 'smiley',
		'description' => 'TOC Block.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'customClassName' => false,
			'multiple' => false,
			'renaming' => false
		),
		'attributes' => array(
			'tocTitle' => array(
				'type' => 'string',
				'default' => 'Table of Contents'
			),
			'tocList' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'allowedBlocks' => array(
			
		),
		'textdomain' => 'alb-toc',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'viewScript' => 'file:./view.js',
		'script' => array(
			'file:./script.js'
		),
		'render' => 'file:./render.php'
	),
	'alb-toc-heading' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'alb/alb-toc-heading',
		'version' => '0.1.0',
		'title' => 'Alb Toc Heading',
		'category' => 'alb',
		'icon' => 'heading',
		'description' => 'TOC Heading Block.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'customClassName' => false,
			'renaming' => false
		),
		'attributes' => array(
			'anchorId' => array(
				'type' => 'string'
			),
			'content' => array(
				'type' => 'rich-text',
				'source' => 'rich-text',
				'selector' => 'h1,h2,h3,h4,h5,h6',
				'role' => 'content'
			),
			'level' => array(
				'type' => 'integer',
				'default' => 1
			)
		),
		'allowedBlocks' => array(
			
		),
		'textdomain' => 'alb-toc',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'viewScript' => 'file:./view.js',
		'render' => 'file:./render.php'
	)
);
