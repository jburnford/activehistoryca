	<div class="wrapper-search-form">
		<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label for="s" class="assistive-text"><?php _e( 'Search', 'rubbersoul-pro' ); ?></label>
			<input type="search" class="txt-search" placeholder="<?php _e('Search...', 'rubbersoul-pro'); ?>" name="s" id="s" />
			<input type="submit" name="submit" id="btn-search-n" value="<?php _e( 'Search', 'rubbersoul-pro' ); ?>" />
		</form>
    </div>