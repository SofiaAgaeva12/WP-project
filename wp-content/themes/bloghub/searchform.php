<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'bloghub' ) ?></span>
    <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search ', 'bloghub' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'bloghub' ) ?>" />
    <div class="search-button">
    	<button type="submit" class="search-submit"><span class="fas fa-search"></span></button>
    </div>
</form>