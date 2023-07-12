<?php
    if( has_post_thumbnail() ){
        ?>
        <div class="post-thumbnail-wrapper">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'bloghub-large' ) ?>"
                alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
            <?php 
                $video_url = get_post_meta( get_the_ID(), 'video_url', true );
                if ( has_post_format('video') && !empty( $video_url )) {
                if ( !empty( $video_url )) {
                    ?>
                    <div class="post-video-button-wrapper">
                        <a href="<?php echo esc_url( $video_url ); ?>" class="video-button mfp-iframe">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                    <?php 
                }
                } 
            ?>
        </div>
        <?php 
    }
?>