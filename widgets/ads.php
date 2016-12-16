<?php
/*-----------------------------------------------------------------------------------*/
/*	Ads Widget Class
/*-----------------------------------------------------------------------------------*/

class MMtheme_Ads_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'class_name' => 'mmtheme_custom_image_widget',
			'description' => __( 'For inserting ads code or a fallback banner ad. Hidden in post preview', 'mmtheme' ),
		);
		parent::__construct( 'mmtheme_custom_image_widget', 'MMtheme Ads Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    $ads_margin = $instance['center'] ? '0 auto' : '0';
    $preview_style = is_preview() ? 'height:'.$instance['height'].'px;'.'background:#eee;' : ''; 
    echo '<div class="robots-nocontent" style="max-width:100%;width:'.$instance['width'].'px;'.$preview_style.'margin:'.$ads_margin.'">';
    if( !is_preview() ) {
      $banner_ad_style = "";  
  		if ( ! empty( $instance['ads_code'] ) ) {   
        echo '<div id="ads-wrapper" class="ads-widget">';
        echo $instance['ads_code'];
        echo '</div>';

        $banner_ad_style = "display:none;";
      }
      if ( ! empty( $instance['img'] ) ) {   
?>
      <a id="custom-image" href="<?= $instance['url']; ?>" style="<?= $banner_ad_style; ?>" rel="nofollow" target="_blank">
        <img src="<?= $instance['img']; ?>" width="<?= $instance['width']; ?>" height="<?= $instance['height']; ?>"></img>
      </a>
<?php
      }
      echo '</div>';
?>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
        var style = window.getComputedStyle(document.getElementById("ads-wrapper"));
        if(style.display === 'none') {
          document.getElementById("custom-image").style.display = 'block';
        }
      });  
    </script>
<?php
    }
    echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'mmtheme' );
    $ads_code = ! empty( $instance['ads_code'] ) ? $instance['ads_code'] : __( '', 'mmtheme' );
    $url = ! empty( $instance['url'] ) ? $instance['url'] : __( '', 'mmtheme' );
    $img = ! empty( $instance['img'] ) ? $instance['img'] : __( '', 'mmtheme' );
    $width = ! empty( $instance['width'] ) ? $instance['width'] : '300';
    $height = ! empty( $instance['height'] ) ? $instance['height'] : '250';
    $center = isset( $instance['center'] ) ? $instance['center'] : 1;
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'ads_code' ); ?>"><?php _e( 'Ad Code:' ); ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'ads_code' ); ?>" name="<?php echo $this->get_field_name( 'ads_code' ); ?>"><?php echo esc_attr( $ads_code ); ?></textarea>
		</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Banner/Fallback Ad Target Url:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
		</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Banner/Fallback Image Url:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="text" value="<?php echo esc_attr( $img ); ?>">
		</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Widht (in px):' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>">
		</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height (in px):' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>">
		</p>    
	  <p>
		<input id="<?php echo $this->get_field_id( 'center' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'center' ); ?>" value="1" <?php checked( 1, $instance['center'] ); ?>/>
		<label for="<?php echo $this->get_field_id( 'center' ); ?>"><?php _e( 'Align Center', 'mmtheme' ); ?></label>
	  </p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
    $instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['ads_code'] = ( ! empty( $new_instance['ads_code'] ) ) ? $new_instance['ads_code'] : '';
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
		$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '300';
		$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '250';
		$instance['center'] = isset( $new_instance['center'] ) ? 1 : 0;

		return $instance;
	}
}