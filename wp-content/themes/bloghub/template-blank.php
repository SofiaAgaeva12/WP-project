<?php
/**
*Template Name: Blank Template
*/

get_header(); ?>

	<?php 
		/**
		* Hook - bloghub_action_before_single_page.
		*
		* @hooked bloghub_single_page_start
		*/
		do_action( 'bloghub_action_before_single_page' );
	?>

    <div class="col-12">
        <?php the_content();?>
    </div>

	<?php 
        /**
        * Hook - bloghub_action_after_single_page.
        *
        * @hooked bloghub_single_page_end
        */
        do_action( 'bloghub_action_after_single_page' );
	?>
<?php get_footer();
