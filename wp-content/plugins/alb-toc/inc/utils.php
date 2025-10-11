<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

trait Utils
{

  private function create_list_toc_children($children) {
		$htmlList = '';
		$htmlList .= '<ul>';
		foreach($children as $child) {
			if(!empty($child->children)){
				$htmlList .= '<li><a href="'.$this->get_toc_link_page($child->atPage).'#'.$child->tocId.'">'.htmlspecialchars($child->content).'</a>'.$this->create_list_toc_children($child->children).'</li>';
			}else {
				$htmlList .= '<li><a href="'.$this->get_toc_link_page($child->atPage).'#'.$child->tocId.'">'.htmlspecialchars($child->content).'</a></li>';
			}
		}
		$htmlList .= '</ul>';
		return $htmlList;
	}

	private function get_toc_link_page($atPage) {
		// untuk page post : paged 
		// untuk page bukan post misal (<!--nextpage-->)) : page
		$currPage = get_query_var('page') ? get_query_var('page') : 1;
		return $atPage == $currPage ? '' : get_permalink()."?page=$atPage";
	}

	private function create_list_toc($listArr) {
		$htmlList = '';
		$htmlList .= '<ul>';
		foreach($listArr as $listItem) {
			if(!empty($listItem->children)){
				$htmlList .= '<li><a href="'.$this->get_toc_link_page($listItem->atPage).'#'.$listItem->tocId.'">'.htmlspecialchars($listItem->content).'</a>'.$this->create_list_toc_children($listItem->children).'</li>';
			}else {
				$htmlList .= '<li><a href="'.$this->get_toc_link_page($listItem->atPage).'#'.$listItem->tocId.'">'.htmlspecialchars($listItem->content).'</a></li>';
			}
		}
		$htmlList .= '</ul>';
		return $htmlList;
	}
  protected function get_filtered_blocks(string $neededBlockName): array
  {
    $filteredBlocks = [];
    if (is_single() || is_page()) {
      $post_content = get_post_field('post_content', get_the_ID());
      $blocks = parse_blocks($post_content);
      $filteredBlocks = array_filter($blocks, fn($_block) => $_block['blockName'] === $neededBlockName);
      $filteredBlocks = array_values($filteredBlocks);
    }
    return $filteredBlocks;
  }

  protected function create_list_html_from_blocks(array $blocks):string {
    return !empty($blocks) ? $this->create_list_toc($blocks) : '';
  }
}