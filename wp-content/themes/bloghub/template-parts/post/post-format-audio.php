<?php 
 $audio_url = get_post_meta(get_the_ID(), 'audio_url', true);
if ( has_post_format('audio') && !empty( $audio_url )) {
   
    if ( !empty( $audio_url )) {
        ?>
            <div class="post-thumbnail-wrapper">
                <?php echo bloghub_iframe_embed( $audio_url, '' ); ?>
            </div>
        <?php 
    }
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

