<form role="search" method="get" class="search-form search-expandable" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
					<div class="search-box">
						<span class="css-icon-search"></span>
		        <input type="search" class="search-field"
		            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
		            value="<?php echo get_search_query() ?>" name="s"
		            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
					</div>
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
