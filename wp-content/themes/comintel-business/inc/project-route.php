<?php

function projectRoutes()
{
  // INI untuk regular rest api
  // register_rest_field(
  //   'project',
  //   'related_service',
  //   [
  //     'get_callback' => function ($post) {
  //       return 'TESTING';
  //     },
  //   ]
  // );
  register_rest_route('project/v1', 'show-projects', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'showProjects',
    'permission_callback' => '__return_true',
  ]);
}

add_action(hook_name: 'rest_api_init', callback: 'projectRoutes');

function showProjects($request) {
  $projectQuery = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'project',
    'meta_key' => 'related_service',
    'meta_value' => $request->get_param('curr_post_id'),
  ));
  $serachResults = [
    'results' => [],
    'found_posts' => $projectQuery->found_posts,
  ];
  while ($projectQuery->have_posts()) {
    $projectQuery->the_post();
    $relatedService = get_field('related_service');
    $serachResults['results'][] = [
      'id' => get_the_ID(),
      'title' => get_the_title(),
      'related_service' => $relatedService ? [
        'id' => $relatedService->ID,
        'title' => $relatedService->post_title,
        'slug' => $relatedService->post_name,
      ] : null,
    ];
  }
  return rest_ensure_response($serachResults);
}

