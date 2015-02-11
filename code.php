<?php

//Code to display terms from certain taxonomy (taxonomy can be set)
//Displays terms that are used on certain (custom) post type (post type can be set)

?>

<?php

global $wp_query;

$args = array(
  'post_type'    => '[your taxonomy]' //[your taxonomy] can be 'post' or any other custom post type
);
query_posts($args);
 
$my_posts     = $wp_query->posts;
$my_post_ids  = wp_list_pluck( $my_posts, 'ID' );
$my_terms     = wp_get_object_terms( $my_post_ids, '[your taxonomy]' ); //[your taxonomy] can be 'category' or any other custom taxonomy

$count      = 1;
$number     = count($my_terms);

foreach ( $my_terms as $my_term ) :
  echo '<a href="' . get_category_link( $my_term->term_id ) . '">' . $my_term->name . '</a>';
      
  if($number > $count):
    echo ' | ';
  endif;
  $count++;

endforeach;
wp_reset_query();

?>