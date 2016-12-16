<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="search-box">
      <svg class="icon icon-search" viewBox="0 0 26 28">
    <path d="M18 13c0-3.859-3.141-7-7-7s-7 3.141-7 7 3.141 7 7 7 7-3.141 7-7zM26 26c0 1.094-0.906 2-2 2-0.531 0-1.047-0.219-1.406-0.594l-5.359-5.344c-1.828 1.266-4.016 1.937-6.234 1.937-6.078 0-11-4.922-11-11s4.922-11 11-11 11 4.922 11 11c0 2.219-0.672 4.406-1.937 6.234l5.359 5.359c0.359 0.359 0.578 0.875 0.578 1.406z"></path>
    </svg>
      <input type="search" class="search-field"
          placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
          value="<?php echo get_search_query() ?>" name="s"
          title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </div>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
