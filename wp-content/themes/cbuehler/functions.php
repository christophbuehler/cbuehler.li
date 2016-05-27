<?php

add_filter('show_admin_bar', '__return_false');

add_action('wp_ajax_get_post_action', 'get_post_action');
add_action('wp_ajax_nopriv_get_post_action', 'get_post_action');

function get_post_action()
{
    $name = filter_input(INPUT_GET, 'name');

    // get the project with the offset
    $post = get_post_by_name($name);

    echo json_encode($post);
    die();
}

function get_post_by_name($name)
{
  $query = new WP_Query(array('name' => $name, 'post_status' => 'publish'));
  if ($query->have_posts()) {
  	while ($query->have_posts()) {
      $query->the_post();
      ob_start();
      the_content();
      $content = ob_get_clean();
      $content = str_replace(']]>', ']]&gt;', $content);

      $post = [
        'title' => get_the_title(),
        'content' => $content,
        'name' => $name,
      ];
      return $post;
    }
  }
  return false;
}
?>
