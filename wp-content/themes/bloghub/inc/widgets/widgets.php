<?php 
// Post Widget.
require BLOGHUB_INC_DIR  . 'widgets/blog-post-widget.php';
require BLOGHUB_INC_DIR  . 'widgets/about-info.php';


// Register Custom Blog Post Widget
function bloghub_custom_register_widget() {
    register_widget('bloghub_recent_post_widget');
    register_widget('BlogHub_About_Info_Widget');
}
add_action('widgets_init', 'bloghub_custom_register_widget');