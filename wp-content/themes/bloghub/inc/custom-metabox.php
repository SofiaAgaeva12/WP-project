<?php 

/** 
* Audio Format For Post
*/

function bloghub_custom_audio_meta_box() {
    add_meta_box(
        'audio_meta_box',
        'Audio Meta Box',
        'bloghub_audio_meta_box_callback',
        'post',
        'normal',
        'high'
    );

    add_meta_box(
        'video_meta_box',
        'Video Meta Box',
        'bloghub_video_meta_box_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'bloghub_custom_audio_meta_box');

// Meta box display function.
function bloghub_audio_meta_box_callback($post) {
    wp_nonce_field('audio_meta_box_nonce', 'audio_meta_box_nonce');
    
    // Add custom fields for the audio meta box here.
    echo '<div class="custom-meta-area">';
    echo '<label for="audio_url">'. esc_html_e( 'Audio URL:', 'bloghub' ) .'</label>';
    echo '<input type="text" id="audio_url" name="audio_url" value="' . esc_attr(get_post_meta($post->ID, 'audio_url', true)) . '"/>';
    echo '</div>';
}

// Video meta box display function
function bloghub_video_meta_box_callback($post) {
    wp_nonce_field('video_meta_box_nonce', 'video_meta_box_nonce');

    echo '<div class="custom-meta-area">';
    echo '<label for="video_url">' . esc_html_e( 'Video URL:', 'bloghub' ) . '</label>';
    echo '<input type="text" id="video_url" name="video_url" value="' . esc_attr(get_post_meta($post->ID, 'video_url', true)) . '" size="30" />';
    echo '</div>';
}

// Save meta box data.
function bloghub_save_audio_meta_box_data($post_id) {
    if (!isset($_POST['audio_meta_box_nonce']) || !wp_verify_nonce($_POST['audio_meta_box_nonce'], 'audio_meta_box_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE')) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['audio_url'])) {
        $allowed_html = array(
            'iframe' => array(
                'src' => array(),
                'width' => array(),
                'height' => array(),
                'scrolling' => array(),
                'frameborder' => array(),
                'allow' => array()
            )
        );
        $iframe_code = wp_kses($_POST['audio_url'], $allowed_html);
        update_post_meta($post_id, 'audio_url', $iframe_code);
    }
}
add_action('save_post', 'bloghub_save_audio_meta_box_data');

// Save meta box data.
function bloghub_save_video_meta_box_data($post_id) {
    if (!isset($_POST['video_meta_box_nonce']) || !wp_verify_nonce($_POST['video_meta_box_nonce'], 'video_meta_box_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE')) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['video_url'])) {
        $allowed_html = array(
            'iframe' => array(
                'src' => array(),
                'width' => array(),
                'height' => array(),
                'scrolling' => array(),
                'frameborder' => array(),
                'allow' => array()
            )
        );
        $iframe_code = wp_kses($_POST['video_url'], $allowed_html);
        update_post_meta($post_id, 'video_url', $iframe_code);
    }
}
add_action('save_post', 'bloghub_save_video_meta_box_data');


/// Gallery Post Format
function bloghub_gallery_meta_box_callback($post) {
    wp_nonce_field('gallery_meta_box_nonce', 'gallery_meta_box_nonce');
    
    $image_ids = get_post_meta($post->ID, 'gallery_image_ids', true);
    ?>
    <div class="custom-meta-area">
        <p>
            <a href="#" id="add-gallery-images" class="button"><?php esc_html_e('Add Gallery Images','bloghub'); ?></a>
            <input type="hidden" name="gallery_image_ids" id="gallery_image_ids" value="<?php echo esc_attr($image_ids); ?>" />
        </p>
        <ul id="gallery-images-list">
            <?php
            if (!empty($image_ids)) {
                $image_ids = explode(',', $image_ids);
                foreach ( $image_ids as $image_id) {
                    $image = wp_get_attachment_image_src($image_id, 'thumbnail');
                    if ($image) {
                        echo '<li><img src="' . esc_attr($image[0]) . '" data-image_id="' . esc_attr($image_id) . '"><span class="remove-image">×</span></li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
    <?php
}

// Save Gallery Meta Box Data
function bloghub_save_gallery_meta_box_data($post_id) {
    if (!isset($_POST['gallery_meta_box_nonce']) || !wp_verify_nonce($_POST['gallery_meta_box_nonce'], 'gallery_meta_box_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['gallery_image_ids'])) {
        $image_ids = sanitize_text_field($_POST['gallery_image_ids']);
        update_post_meta($post_id, 'gallery_image_ids', $image_ids);
    }
}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'gallery_meta_box',
        'Gallery Meta Box', 
        'bloghub_gallery_meta_box_callback', 
        'post', 
        'normal', 
        'high'
    );
});
add_action('save_post', 'bloghub_save_gallery_meta_box_data');

// Enqueue JavaScript to handle the meta box visibility.
function bloghub_admin_enqueue_scripts() {
    wp_enqueue_style( 'bloghub-metabox-admin-css', get_template_directory_uri().'/assets/css/metabox-admin.css', array(), BLOGHUB_VERSION, 'all' );
    wp_enqueue_script( 'bloghub-metabox-admin', get_template_directory_uri() . '/assets/js/metabox-admin.js', array('jquery'), BLOGHUB_VERSION, true);
}
add_action('admin_enqueue_scripts', 'bloghub_admin_enqueue_scripts');