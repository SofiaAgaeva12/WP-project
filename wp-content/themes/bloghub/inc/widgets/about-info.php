<?php 
class BlogHub_About_Info_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'bloghub_about_info_widget',
            esc_html__('BlogHub: About Info','bloghub'),
            array(
                'description' => esc_html__( ' BlogHub About Info WIdget ','bloghub'),
            )
        );
    }

    public function widget($args, $instance) {
        echo wp_kses_post( $args['before_widget'] );
        
        if (!empty($instance['title'])) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters('widget_title', $instance['title']) . wp_kses_post( $args['after_title'] );
        }

        // Add social media links
        $social_links = array(
            'facebook-f' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin-in' => 'LinkedIn',
            'pinterest' => 'Pinterest',
            'youtube' => 'YouTube'
        );

        ?>
        <div class="bloghub-about-info">
            <div class="about-info-top">

                <?php if (!empty($instance['image_url'])) : ?>
                    <div class="about-info-image">
                        <img src="<?php echo esc_url($instance['image_url']); ?>" alt="<?php echo esc_attr($instance['name']); ?>">
                    </div>
                <?php endif; ?>

                <div class="about-info-meta">
                    <?php if (!empty($instance['name'])) {
                        echo '<h2 class="about-info-name">' . esc_html($instance['name']) . '</h2>';
                    }?>
                    <?php if (!empty($instance['subname'])) {
                        echo '<span class="about-info-sname">' . esc_html($instance['subname']) . '</span>';
                    }?>
                </div>

            </div>

            <div class="about-info-content">
                <?php 
                    if (!empty($instance['description'])) {
                        echo '<p>' . esc_html($instance['description']) . '</p>';
                    }
                ?>

                <?php if( !empty( $social_links ) ) : ?>
                <div class="social-links">
                    <ul>
                       <?php 
                        foreach ($social_links as $key => $label) :
                        if (!empty($instance[$key])) : ?>
                            <li><a href="<?php echo esc_url( esc_url($instance[$key]) ); ?>" target="_blank" title="<?php echo esc_attr($label); ?>" class="<?php echo esc_attr($label); ?>"><i class="fab fa-<?php echo esc_attr($key); ?>"></i></a></li>
                        <?php endif; endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php 
        echo wp_kses_post($args['after_widget']);
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $name = !empty($instance['name']) ? $instance['name'] : '';
        $subname = !empty($instance['subname']) ? $instance['subname'] : '';
        $image_url = !empty($instance['image_url']) ? $instance['image_url'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';

        $social_links = array(
            'facebook-f' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin-in' => 'LinkedIn',
            'pinterest' => 'Pinterest',
            'youtube' => 'YouTube'
        );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"> <?php echo esc_html__( 'Title:', 'bloghub' ); ?> </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('name') ); ?>"><?php echo esc_html__( 'Name:', 'bloghub' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('name') ); ?>" name="<?php echo esc_attr( $this->get_field_name('name') ); ?>" type="text" value="<?php echo esc_attr($name); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('subname') ); ?>"><?php echo esc_html__( 'Designation:', 'bloghub' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('subname') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subname') ); ?>" type="text" value="<?php echo esc_attr($subname); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('image_url') ); ?>"><?php echo esc_html__( 'Author Image:', 'bloghub' ); ?></label>
            <input class="widefat widget-image-url" id="<?php echo esc_attr( $this->get_field_id('image_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('image_url') ); ?>" type="text" value="<?php echo esc_url($image_url); ?>">
            <button class="upload-image-button button button-primary"><?php echo esc_html__( 'Upload Image:', 'bloghub' ); ?></button>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('description') ); ?>"><?php echo esc_html__( 'Description:', 'bloghub' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('description') ); ?>" name="<?php echo esc_attr( $this->get_field_name('description') ); ?>" rows="8"><?php echo esc_textarea($description); ?></textarea>
        </p>

        <?php
        foreach ($social_links as $key => $label) {
            $link_value = !empty($instance[$key]) ? $instance[$key] : '';
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id($key) ); ?>"><?php echo $label; ?> <?php echo esc_html__( 'URL:', 'bloghub' ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id($key) ); ?>" name="<?php echo esc_attr( $this->get_field_name($key) ); ?>" type="text" value="<?php echo esc_url($link_value); ?>">
            </p>
            <?php
        }
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['name'] = (!empty($new_instance['name'])) ? strip_tags($new_instance['name']) : '';
        $instance['subname'] = (!empty($new_instance['subname'])) ? strip_tags($new_instance['subname']) : '';
        $instance['image_url'] = (!empty($new_instance['image_url'])) ? esc_url_raw($new_instance['image_url']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? sanitize_textarea_field($new_instance['description']) : '';
    
        $social_links = array(
            'facebook-f',
            'twitter',
            'instagram',
            'linkedin-in',
            'pinterest',
            'youtube'
        );
    
        foreach ($social_links as $key) {
            $instance[$key] = (!empty($new_instance[$key])) ? esc_url_raw($new_instance[$key]) : '';
        }
    
        return $instance;
    }
}

function enqueue_widget_uploader_script() {
    // Register the script
    wp_register_script('widget-uploader', get_template_directory_uri() . '/assets/js/widget-uploader.js', array('jquery'), '1.0.0', true);

    // Enqueue the script only on the widgets admin page
    if (is_admin() && get_current_screen()->id === 'widgets') {
        wp_enqueue_media(); // Enqueue the WordPress media uploader
        wp_enqueue_script('widget-uploader');
    }
}
add_action('admin_enqueue_scripts', 'enqueue_widget_uploader_script');
?>