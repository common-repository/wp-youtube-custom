<?php

class WPyoutubefeaturedWidget extends WP_Widget
{
	/**
	* Declares the WPyoutubefeaturedWidget class.
	*
	*/
	function WPyoutubefeaturedWidget(){
		$widget_ops = array('classname' => 'widget_YoutubeFeaturedWP', 'description' =>  "Set a featured YouTube video on site." );
		$control_ops = array('width' => 250, 'height' => 250);
		$this->WP_Widget('YoutubeFeaturedWP', 'WPvote Featured YouTube', $widget_ops, $control_ops);
	}

	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		extract($args);
		$title_widget_tube = apply_filters('widget_title', empty($instance['title']) ? 'WPvote Featured YouTube' : $instance['title']);
        $width = empty($instance['width']) ? '250' : $instance['width'];
		$height = empty($instance['height']) ? '175' : $instance['height'];
        $youtubeid =empty($instance['youtubeid']) ? '' : $instance['youtubeid'];
        $theme =empty($instance['theme']) ? 'dark' : $instance['theme'];
        $fullscreen =empty($instance['fullscreen']) ? 'yes' : $instance['fullscreen'];
        $infotitle =empty($instance['infotitle']) ? 'yes' : $instance['infotitle'];
        $controls =empty($instance['controls']) ? 'yes' : $instance['controls'];
        $related =empty($instance['related']) ? 'yes' : $instance['related'];
        $autoplay =empty($instance['autoplay']) ? 'no' : $instance['autoplay'];
        $typedisplay =empty($instance['typedisplay']) ? 'yes' : $instance['typedisplay'];
        $customclass =empty($instance['customclass']) ? '' : $instance['customclass'];
        if ($customclass ==''){$div1=''; $div2='';}else{$div1='<div class="'.$customclass.'">';$div2='</div>';}
        if($fullscreen=='yes'){$fullscreeny=1;}else{$fullscreeny=0;}
        if($infotitle=='yes'){$infotitley=1;}else{$infotitley=0;}
        if($controls=='yes'){$controlsy=1;}else{$controlsy=0;}
        if($related=='yes'){$relatedy=1;}else{$relatedy=0;}
        if($autoplay=='yes'){$autoplayy=1;}else{$autoplayy=0;}
        if($fullscreen=='yes'){$autoplayp='true';}else{$autoplayp='false';}
        $urls = array(
        '/http:\/\/www.youtube.com\/watch\?v=([a-zA-Z0-9_-]+)([%&=#a-zA-Z0-9_-])*/',
        '/http:\/\/www.youtube.com\/watch#\!v=([a-zA-Z0-9_-]+)([%&=#a-zA-Z0-9_-])*/',
        '/http:\/\/youtu.be\/([a-zA-Z0-9_-]+)/',
        );
        $youtubeid= preg_replace($urls,'$1',$youtubeid);
        if ($youtubeid==''){
        $youtube_box ='<div style="padding:5px;background:#FFCC99;border:1px solid #FF9966;">&nbsp;Please set YouTube Video ID</div>'; }else{
        if ($typedisplay=='yes'){
        $youtube_box = $div1.'<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$youtubeid.'?fs='.$fullscreeny.'&amp;hl=en_US&amp;iv_load_policy=3&amp;showinfo='.$infotitley.'&amp;controls='.$controlsy.'&amp;autoplay='.$autoplayy.'&amp;rel='.$relatedy.'&amp;theme='.$theme.'&amp;autohide=1&amp;version=3" frameborder="0" allowfullscreen></iframe>'.$div2;}else{
        $youtube_box = $div1.'<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://www.youtube.com/p/'.$youtubeid.'?fs='.$fullscreeny.'&amp;hl=en_US&amp;iv_load_policy=3&amp;showinfo='.$infotitley.'&amp;controls='.$controlsy.'&amp;autoplay='.$autoplayy.'&amp;rel='.$relatedy.'&amp;theme='.$theme.'&amp;autohide=1&amp;version=3"></param><param name="allowFullScreen" value="'.$autoplayp.'"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'.$youtubeid.'?fs='.$fullscreeny.'&amp;hl=en_US&amp;iv_load_policy=3&amp;showinfo='.$infotitley.'&amp;controls='.$controlsy.'&amp;autoplay='.$autoplayy.'&amp;rel='.$relatedy.'&amp;theme='.$theme.'&amp;autohide=1&amp;version=3" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="'.$autoplayp.'" width="'.$width.'" height="'.$height.'"></embed></object>'.$div2;
        }
        }
		# Before the widget
		echo $before_widget;

		# The title
		if ( $title_widget_tube )
		echo $before_title . $title_widget_tube . $after_title;
        echo $youtube_box;

		# After the widget
		echo $after_widget;
	}
    /* Update options */
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
        $instance['width'] = strip_tags(stripslashes($new_instance['width']));
		$instance['height'] = strip_tags(stripslashes($new_instance['height']));
        $instance['youtubeid'] = strip_tags(stripslashes($new_instance['youtubeid']));
        $instance['theme'] = strip_tags(stripslashes($new_instance['theme']));
        $instance['fullscreen'] = strip_tags(stripslashes($new_instance['fullscreen']));
        $instance['infotitle'] = strip_tags(stripslashes($new_instance['infotitle']));
        $instance['controls'] = strip_tags(stripslashes($new_instance['controls']));
        $instance['related'] = strip_tags(stripslashes($new_instance['related']));
        $instance['autoplay'] = strip_tags(stripslashes($new_instance['autoplay']));
        $instance['typedisplay'] = strip_tags(stripslashes($new_instance['typedisplay']));
        $instance['customclass'] = strip_tags(stripslashes($new_instance['customclass']));
		return $instance;
	}
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance,  array('title'=>'',  'height'=>'175', 'width'=>'250','youtubeid'=>'','fullscreen'=>'yes','theme'=>'dark','infotitle'=>'yes','controls'=>'yes','related'=>'yes','autoplay'=>'no','typedisplay'=>'yes','customclass'=>'') );
        $title_widget_tube = htmlspecialchars($instance['title']);
        $width = empty($instance['width']) ? '250' : $instance['width'];
		$height = empty($instance['height']) ? '175' : $instance['height'];
        $youtubeid = htmlspecialchars($instance['youtubeid']);
        $fullscreen =empty($instance['fullscreen']) ? 'yes' : $instance['fullscreen'];
        $theme =empty($instance['theme']) ? 'dark' : $instance['theme'];
        $infotitle =empty($instance['infotitle']) ? 'yes' : $instance['infotitle'];
        $controls =empty($instance['controls']) ? 'yes' : $instance['controls'];
        $related =empty($instance['related']) ? 'yes' : $instance['related'];
        $autoplay =empty($instance['autoplay']) ? 'no' : $instance['autoplay'];
        $typedisplay =empty($instance['typedisplay']) ? 'yes' : $instance['typedisplay'];
        $customclass =empty($instance['customclass']) ? '' : $instance['customclass'];


		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('title') . '"><b><span style="color:#2680AA;">Widget Title</span></b>: <input style="width:220px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title_widget_tube . '" /></label></p>';
?>
    <hr style=" border:#2680AA 1px solid;">
    <label for="<?php echo  $this->get_field_name('youtubeid'); ?>"><b><span style="color:#2680AA;">YouTube : </span></b></label>
	<input name="<?php echo  $this->get_field_name('youtubeid'); ?>" id="<?php echo  $this->get_field_name('youtubeid'); ?>" value="<?php echo $youtubeid; ?>" size="25"   type="text">
	<br /><small>(<i>Insert YouTube video ID or <br /><b>http://youtu.be/xxxxx</b> , <br /><b>http://www.youtube.com/watch?v=xxxxx </b>.</i>)</small><br /><hr style=" border:#2680AA 1px solid;">
    <label for="<?php echo  $this->get_field_name('autoplay'); ?>"><b><span style="color:#2680AA;">Auto play video: </span></b></label>
    <select name="<?php echo  $this->get_field_name('autoplay'); ?>" id="<?php echo  $this->get_field_name('autoplay'); ?>">
    <option value="yes" <?php if ($autoplay == 'yes') echo 'selected="Enable"'; ?> >Enable</option>
	<option value="no" <?php if ($autoplay == 'no') echo 'selected="Disable"'; ?> >Disable</option>
    </select>
    <br /><small>(<i>Enable or disable autoplay video.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('typedisplay'); ?>"><b><span style="color:#2680AA;">Display type: </span></b></label>
    <select name="<?php echo  $this->get_field_name('typedisplay'); ?>" id="<?php echo  $this->get_field_name('typedisplay'); ?>">
    <option value="yes" <?php if ($typedisplay == 'yes') echo 'selected="Enable"'; ?> >Iframe</option>
	<option value="no" <?php if ($typedisplay == 'no') echo 'selected="Disable"'; ?> >Embed</option>
    </select>
    <br /><small>(<i>Choose the way of showing video..</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('width'); ?>"><b><span style="color:#2680AA;">Width: </span></b></label>
	<input name="<?php echo  $this->get_field_name('width'); ?>" id="<?php echo  $this->get_field_name('width'); ?>" value="<?php echo $width; ?>" size="2"   type="text">&nbsp;px
	<br /><small>(<i>Set video width.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('height'); ?>"><b><span style="color:#2680AA;">Height: </span></b></label>
	<input name="<?php echo  $this->get_field_name('height'); ?>" id="<?php echo  $this->get_field_name('height'); ?>" value="<?php echo $height; ?>" size="2"   type="text">&nbsp;px
	<br /><small>(<i>Set video height.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('theme'); ?>"><b><span style="color:#2680AA;">Theme: </span></b></label>
    <select name="<?php echo  $this->get_field_name('theme'); ?>" id="<?php echo  $this->get_field_name('theme'); ?>">
    <option value="dark" <?php if ($theme == 'dark') echo 'selected="Dark"'; ?> >Dark</option>
	<option value="light" <?php if ($theme == 'light') echo 'selected="Light"'; ?> >Light</option>
    </select>
    <br /><small>(<i>Choose player theme.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('fullscreen'); ?>"><b><span style="color:#2680AA;">Fullscreen: </span></b></label>
    <select name="<?php echo  $this->get_field_name('fullscreen'); ?>" id="<?php echo  $this->get_field_name('fullscreen'); ?>">
    <option value="yes" <?php if ($fullscreen == 'yes') echo 'selected="Enable"'; ?> >Enable</option>
	<option value="no" <?php if ($fullscreen == 'no') echo 'selected="Disable"'; ?> >Disable</option>
    </select>
    <br /><small>(<i>Enable or disable fullscreen.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('infotitle'); ?>"><b><span style="color:#2680AA;">Show title info: </span></b></label>
    <select name="<?php echo  $this->get_field_name('infotitle'); ?>" id="<?php echo  $this->get_field_name('infotitle'); ?>">
    <option value="yes" <?php if ($infotitle == 'yes') echo 'selected="Enable"'; ?> >Enable</option>
	<option value="no" <?php if ($infotitle == 'no') echo 'selected="Disable"'; ?> >Disable</option>
    </select>
    <br /><small>(<i>Enable or disable video title info.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('controls'); ?>"><b><span style="color:#2680AA;">Show controls: </span></b></label>
    <select name="<?php echo  $this->get_field_name('controls'); ?>" id="<?php echo  $this->get_field_name('controls'); ?>">
    <option value="yes" <?php if ($controls == 'yes') echo 'selected="Enable"'; ?> >Enable</option>
	<option value="no" <?php if ($controls == 'no') echo 'selected="Disable"'; ?> >Disable</option>
    </select>
    <br /><small>(<i>Enable or disable video nav. bar.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('related'); ?>"><b><span style="color:#2680AA;">Related video: </span></b></label>
    <select name="<?php echo  $this->get_field_name('related'); ?>" id="<?php echo  $this->get_field_name('related'); ?>">
    <option value="yes" <?php if ($related == 'yes') echo 'selected="Enable"'; ?> >Enable</option>
	<option value="no" <?php if ($related == 'no') echo 'selected="Disable"'; ?> >Disable</option>
    </select>
    <br /><small>(<i>Enable or disable related video.</i>)</small><br />
    <label for="<?php echo  $this->get_field_name('customclass'); ?>"><b><span style="color:#2680AA;">CSS class: </span></b></label>
    <input name="<?php echo  $this->get_field_name('customclass'); ?>" id="<?php echo  $this->get_field_name('customclass'); ?>" value="<?php echo $customclass; ?>" size="7"   type="text">&nbsp;name.
    <br /><small>(<i>Optional, if need to customize border of video or something..</i>)</small><br />
    <hr style=" border:#2680AA 1px solid;">
    <i>Check us for new <a href="http://www.wpvote.me" target="_blank">plugins</a>.</i>
<?php
	} //end of form

}// END class


	function WPyoutubeFeaturedInit() {
	register_widget('WPyoutubefeaturedWidget');
	}
	add_action('widgets_init', 'WPyoutubeFeaturedInit');
?>