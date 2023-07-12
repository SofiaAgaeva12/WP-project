<?php

/**
 * BlogHub Recent Post Widgets
 */
class bloghub_recent_post_widget extends WP_Widget {
	public function __construct() {
		parent::__construct( 'bloghub-recent-posts', esc_html__( 'BlogHub : Recent Posts', 'bloghub' ), array(
			'description' => esc_html__( 'BlogHub recent posts widget', 'bloghub' ),
		) );
	}

	public function widget( $args, $instance ) {
		?>
            <?php echo wp_kses_post( $args['before_widget'] ); ?>
            <?php if ( !empty( $instance['title'] ) ) {
                echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
            }
		?>
		<ul class="bloghub-recent-post-widget">
			<?php
                $title_word_count = !empty( $instance['title_word_count'] ) ? $instance['title_word_count'] : 6;
                $post_count = !empty( $instance['post_count'] ) ? $instance['post_count'] : 2;
                $category = $instance['category'];
                $post_order = $instance['post_order'];
                $order_by = $instance['order_by'];

                if ( !empty( $category ) ) {
                    $resent_post = new WP_Query( array(
                        'post_type'           => 'post',
                        'posts_per_page'      => $post_count,
                        'ignore_sticky_posts' => true,
                        'order'               => $post_order,
                        'order_by'            => $order_by,
                        'tax_query'           => array(
                            array(
                                'taxonomy' => 'category',
                                'terms'    => $category,
                            ),
                        ),
                    ) );
                } else {
                    $resent_post = new WP_Query( array(
                        'post_type'           => 'post',
                        'posts_per_page'      => $post_count,
                        'ignore_sticky_posts' => true,
                        'order'               => $post_order,
                        'orderby'            => $order_by,
                    ) );
                }
                while ( $resent_post->have_posts() ): $resent_post->the_post(); ?>
                    <li <?php if ( has_post_thumbnail() ) {echo 'class= "li-have-thumbnail"';} ?>>
                        <?php if ( has_post_thumbnail() ): ?>
                            <img src="<?php esc_url( the_post_thumbnail_url( 'thumbnail' ) ); ?>"
                                    alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                        <?php endif; ?>

                        <div class="bloghub-recent-post-title-and-date">
                            <h6><a class="bloghub-recent-post-widget-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo wp_trim_words( get_the_title(), $title_word_count, ' ...' ); ?></a>
                            </h6>
                            <div class="bloghub-recent-widget-date"><?php if ( function_exists( 'bloghub_posted_on' ) ) {bloghub_posted_on();} ?></div>
                        </div>
                        
                    </li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php echo wp_kses_post( $args['after_widget'] ); ?>
		<?php
    }

	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		$title_word_count = !empty( $instance['title_word_count'] ) ? $instance['title_word_count'] : 6;
		$post_count = !empty( $instance['post_count'] ) ? $instance['post_count'] : 2;
		$category = !empty( $instance['category'] ) ? $instance['category'] : array();
		$post_order = !empty( $instance['post_order'] ) ? $instance['post_order'] : array();
		$order_by = !empty( $instance['order_by'] ) ? $instance['order_by'] : array();

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title :', 'bloghub' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_word_count' ) ); ?>"><?php echo esc_html__( 'Title Word Count :', 'bloghub' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_word_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_word_count' ) ); ?>" type="number" min="1" value="<?php echo esc_attr( $title_word_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"><?php echo esc_html__( 'Post Count:', 'bloghub' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_count' ) ); ?>" type="number" min="-1" value="<?php echo esc_attr( $post_count ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo esc_html__( 'Category:', 'bloghub' ); ?>
				<select class='widefat' id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text">
					<option value=''><?php echo esc_html__( 'All Category', 'bloghub' ); ?></option>
					<?php
                        $terms = get_terms( 
                            array(
                                'taxonomy'   => 'category',
                                'hide_empty' => true,
                            ) 
                        );

		                if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
			                foreach ( $terms as $term ) { ?>
                                <option value='<?php echo $term->term_id ?>'<?php echo ( $category == $term->term_id ) ? 'selected' : ''; ?>>
                                    <?php echo $term->name ?>
                                </option>
							<?php
                            }
                        }
                    ?>
				</select>
			</label>
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'post_order' ); ?>"><?php echo esc_html__( 'Post Order:', 'bloghub' ); ?>
				<select class='widefat' id="<?php echo $this->get_field_id( 'post_order' ); ?>" name="<?php echo $this->get_field_name( 'post_order' ); ?>" type="text">
					<option value='DESC'><?php echo esc_html__( 'DESC', 'bloghub' ); ?></option>
					<option value='ASC'><?php echo esc_html__( 'ASC', 'bloghub' ); ?></option>
				</select>
			</label>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'order_by' ); ?>"><?php echo esc_html__( 'Order By', 'bloghub' ); ?>
				<select class='widefat' id="<?php echo $this->get_field_id( 'order_by' ); ?>" name="<?php echo $this->get_field_name( 'order_by' ); ?>" type="text">
					<option value='none'><?php echo esc_html__( 'None', 'bloghub' ); ?></option>
					<option value='ID'><?php echo esc_html__( 'ID', 'bloghub' ); ?></option>
					<option value='date'><?php echo esc_html__( 'Date', 'bloghub' ); ?></option>
					<option value='name'><?php echo esc_html__( 'Name', 'bloghub' ); ?></option>
					<option value='title'><?php echo esc_html__( 'Title', 'bloghub' ); ?></option>
					<option value='comment_count'><?php echo esc_html__( 'Comment Count', 'bloghub' ); ?></option>
					<option value='rand'><?php echo esc_html__( 'Rand', 'bloghub' ); ?></option>
				</select>
			</label>
		</p>

	<?php
    }

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['title_word_count'] = ( !empty( $new_instance['title_word_count'] ) ) ? sanitize_text_field( $new_instance['title_word_count'] ) : 10;

		$instance['post_count'] = ( !empty( $new_instance['post_count'] ) ) ? sanitize_text_field( $new_instance['post_count'] ) : 4;

		$instance['category'] = ( !empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
		$instance['post_order'] = ( !empty( $new_instance['post_order'] ) ) ? sanitize_text_field( $new_instance['post_order'] ) : '';
		$instance['order_by'] = ( !empty( $new_instance['order_by'] ) ) ? sanitize_text_field( $new_instance['order_by'] ) : '';

		return $instance;
	}
}