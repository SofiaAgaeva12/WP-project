<?php 
    // Get gallery image IDs.
    $gallery_image_ids = '';
    $gallery_image_ids = get_post_meta(get_the_ID(), 'gallery_image_ids', true);

    if ( has_post_format('gallery') && !empty( $gallery_image_ids )) {
        $gallery_images = explode(',', $gallery_image_ids);
        ?>
            <div class="post-thumbnail-wrapper post-gallery">
                <?php foreach ( $gallery_images as $gallery_image ) : 
                $image_url = wp_get_attachment_image_src( $gallery_image, 'bloghub-large');
                if( !empty($image_url) ) :
                ?>
                    <div class="post-gallery-item">
                        <img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                    </div>
                <?php endif; endforeach; ?>
            </div>
        <?php 
    }else{
        if( has_post_thumbnail() ){
            ?>
                <div class="post-thumbnail-wrapper">
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'bloghub-large' ) ?>"
                        alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                </div>
            <?php 
        }
    }
?>