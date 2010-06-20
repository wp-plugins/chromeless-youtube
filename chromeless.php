<?php
/*
Plugin Name: Chromeless YouTube
Plugin URI: http://hyperspatial.com/wordpress-development/plugins/chromeless-youtube/
Description: This chromeless YouTube player enables you to easily display videos on your site. Each player instance displays a different video and can be resized.
Version: 1.01
Author: Adam J Nowak
Author URI: http://hyperspatial.com
License: GPL2
*/

/*
Copyright 2010  Adam J Nowak  (email : adam@hyperspatial.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
class Chromeless extends WP_Widget {
   function chromeless() {
        $widget_ops = array('classname' => 'widget_chromeless', 'description' => __( "A custom YouTube video player") );
		$control_ops = array('width' => 300, 'height' => 300);
		$this->WP_Widget('chromeless', __('Chromeless YouTube'), $widget_ops, $control_ops);
   }

   function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$video_source = $instance['video_source'];
		$video_width = $instance['video_width'];
		$video_height = $instance['video_height'];
		$autoplay = $instance['autoplay'];
		$youtube_controls = $instance['youtube_controls'];
		
		//Defaults for Embed Code
		if($video_source == 'Not Set'){ $video_source = "hnwccozR_oI"; } 
		if($video_width == ''){ $video_width = 280; } 
		if($video_height == ''){ $video_height = 200; }
		if($autoplay == ''){ $autoplay = "No"; }
		if($youtube_controls == ''){ $youtube_controls = "No"; }
		?>
              
		<?php echo $before_widget; ?>
        
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <object type="application/x-shockwave-flash" data="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/chromeless-youtube/chromeless.swf" width="<?php echo $video_width; ?>" height="<?php echo $video_height; ?>">
          <param name="flashVars" value="video_source=<?php echo $video_source; ?>&video_width=<?php echo $video_width; ?>&video_height=<?php echo $video_height; ?>&autoplay=<?php echo $autoplay; ?>&youtube_controls=<?php echo $youtube_controls; ?>" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="scripts/expressInstall.swf" />
          <param name="movie" value="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/chromeless-youtube/chromeless.swf" />
        </object>	
         
        <?php echo $after_widget; ?>
        
        <?php
    }

    function update($new_instance, $old_instance) {		
	    $instance = $old_instance;
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['video_source'] = $new_instance['video_source'];
		$instance['video_width'] = $new_instance['video_width'];
		$instance['video_height'] = $new_instance['video_height'];
		$instance['autoplay'] = $new_instance['autoplay'];
		$instance['youtube_controls'] = $new_instance['youtube_controls'];
		return $instance;
	}

    function form($instance) {
		//Set new widget defaults
		$defaults = array(
			'title'   => 'My Video', 
			'video_source' => 'Not Set',
			'video_width' => '280',
			'video_height' => '180',
			'autoplay' => 'No',
			'youtube_controls' => 'No'
		);
		$instance = wp_parse_args((array)$instance, $defaults); 
		$title = esc_attr($instance['title']);
		$video_source = esc_attr($instance['video_source']);
		$video_width = esc_attr($instance['video_width']);
		$video_height = esc_attr($instance['video_height']);
		$autoplay = esc_attr($instance['autoplay']);
		$youtube_controls = esc_attr($instance['youtube_controls']);
		?>
        <p>
        	<!-- Title Input Field -->
       	    <label for="<?php echo $this->get_field_id('title'); ?>">
			<?php _e('Widget Title:'); ?><br />            
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
            name="<?php echo $this->get_field_name('title'); ?>" 
            value="<?php echo $title; ?>" 
            type="text" />
            </label>
        </p>
        <p>
        	<!-- Video Source Input Field -->
       	    <label for="<?php echo $this->get_field_id('video_source'); ?>">
			<?php _e('YouTube Video ID:'); ?><br />            
            <input style="width:150px;" class="widefat" id="<?php echo $this->get_field_id('video_source'); ?>" 
            name="<?php echo $this->get_field_name('video_source'); ?>" 
            value="<?php echo $video_source; ?>" 
            type="text" />
            </label>
        </p>
        <p>
        	<!-- Source Width Input Field -->
       	    <label for="<?php echo $this->get_field_id('video_width'); ?>">
			<?php _e('Width:'); ?>
            
            <input style="width:64px;" class="widefat" id="<?php echo $this->get_field_id('video_width'); ?>"
            name="<?php echo $this->get_field_name('video_width'); ?>" 
            value="<?php echo $video_width; ?>" 
            type="text" />
            <?php _e('px'); ?>
            </label>
			<!-- Source Height Input Field -->
       	    <label style="margin-left:30px;" for="<?php echo $this->get_field_id('video_height'); ?>">
			<?php _e('Height:'); ?>
            
            <input style="width:64px;" class="widefat" id="<?php echo $this->get_field_id('video_height'); ?>"
            name="<?php echo $this->get_field_name('video_height'); ?>" 
            value="<?php echo $video_height; ?>" 
            type="text" />
            <?php _e('px'); ?>
            </label>
		</p>
        <p>
        	<!-- Autoplay -->
            <label>
            <input id="<?php echo $this->get_field_id('autoplay'); ?>" 
            name="<?php echo $this->get_field_name('autoplay'); ?>" 
            value="Yes"
            type="checkbox" 
            <?php if ($instance['autoplay'] == 'Yes') echo 'checked'; ?> />
            Autoplay
            </label>
        </p>
        <p>
        	<!-- YouTube Controls -->
            <label>
            <input id="<?php echo $this->get_field_id('youtube_controls'); ?>" 
            name="<?php echo $this->get_field_name('youtube_controls'); ?>" 
            value="Yes"
            type="checkbox" 
            <?php if ($instance['youtube_controls'] == 'Yes') echo 'checked'; ?> />
            Show original YouTube controls
            </label>
        </p>
        <hr />
        <p>Shortcode for posts: <span style="color:#669; font-size:10px;">[chromeless id=hnwccozR_oI width=280 height=180 autoplay=no ytcontrols=no]</span></p>
       <p>PHP for templates: <span style="color:#669; font-size:10px;">&lt;?php chromeless_youtube ('hnwccozR_oI','280','180','no','no'); ?&gt;</span></p>
	    
<?php 
    }
	
} //End Chromeless class

//Template tag for theme chromeless_youtube('id','width','height','autoplay','ytcontrols']
function chromeless_youtube($id,$width,$height,$autoplay,$ytcontrols){
	//Capitalization fix
	$autoplay = ucwords($autoplay);
	$ytcontrols = ucwords($ytcontrols);
	$wp_install_url = get_bloginfo('wpurl');	
	
	echo '<object type="application/x-shockwave-flash" data="' . $wp_install_url  .  '/wp-content/plugins/chromeless-youtube/chromeless.swf" width="' . $width . '" height="' . $height . '">
		<param name="flashVars" value="video_source=' . $id . '&video_width=' . $width . '&video_height=' . $height . '&autoplay=' . $autoplay . '&youtube_controls=' . $ytcontrols . '" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="scripts/expressInstall.swf" />
        <param name="movie" value="' .  $wp_install_url  .  '/wp-content/plugins/chromeless-youtube/chromeless.swf" />
        </object>';      
}

//Shortcode [chromeless id=##### width=### height=### autoplay=yes ytcontrols=no]
function chromeless_youtube_shortcode($atts){
	extract(shortcode_atts(array(
		'id' => 'Not Set',
		'width' => '280',
		'height' => '180',
		'autoplay' => 'No',
		'ytcontrols' => 'No',
	), $atts));
	//Capitalization fix
	$autoplay = ucwords($autoplay);
	$ytcontrols = ucwords($ytcontrols);
	$wp_install_url = get_bloginfo('wpurl');
	
	return '<object type="application/x-shockwave-flash" data="' . $wp_install_url  .  '/wp-content/plugins/chromeless-youtube/chromeless.swf" width="' . $width . '" height="' . $height . '">
		<param name="flashVars" value="video_source=' . $id . '&video_width=' . $width . '&video_height=' . $height . '&autoplay=' . $autoplay . '&youtube_controls=' . $ytcontrols . '" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="scripts/expressInstall.swf" />
        <param name="movie" value="' . $wp_install_url  .  '/wp-content/plugins/chromeless-youtube/chromeless.swf" />
        </object>';      
}
// register Chromeless widget
add_action('widgets_init', create_function('', 'return register_widget("Chromeless");'));
add_shortcode('chromeless', 'chromeless_youtube_shortcode');
?>