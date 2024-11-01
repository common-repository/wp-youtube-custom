<?php
/*
Plugin Name: Wp Youtube Custom
Plugin URI: http://www.wpvote.me/wpvote-youtube-custom-player-wordpress
Description: With this plugin you will be able to set up embed player from youtube and customize it according to the appearance of your blog or website. Settings are very easy to use and no any pre-knowledge is needed.
Version: 1.0
Author: arrond1025
Author URI: http://www.wpvote.me
*/

/*  Copyright 2011

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

add_filter('the_content', 'display_wpvote_youtube');
add_action('admin_menu', 'my_wpvotetube_admin_menu');
function my_wpvotetube_admin_menu() {add_options_page(  'WPvote YouTube Custom','WPvote Youtube',8,'wpvote_youtube','wpvote_options_youtube');}
// action links
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'wpvote_settings_link', 10, 1);
function wpvote_settings_link($links) {
	$links[] = '<a href="'.admin_url('options-general.php?page=wpvote_youtube').'">'.__('Settings', '').'</a>';
	return $links;
}
define( 'WPVOTEY_DIR', WP_PLUGIN_DIR . '/wpvote-youtube' );
define( 'WPVOTEY_URL', WP_PLUGIN_URL . '/wpvote-youtube' );

function admin_register_head() {
    $url = WPVOTEY_URL. '/css/wpvote-tube.css';
    $js =  WPVOTEY_URL. '/js/opt.js';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
    echo "<script type='text/javascript' src='$js'></script>\n";
}
add_action('admin_head', 'admin_register_head');
/* WPvote video options*/
function wpvote_options_youtube() {

$options_to_wpvote= array('display_wpvote_tube_width','display_wpvote_tube_height','display_wpvote_tube_full','display_wpvote_tube_info','display_wpvote_tube_rel','display_wpvote_tube_pl','display_wpvote_tube_border','display_wpvote_tube_controle','display_wpvote_tube_theme','display_wpvote_tube_css','display_wpvote_tube_customw,display_wpvote_tube_type','display_wpvote_tube_widget');
?>
<div class="wrap">
<div class="wp-vote-wrap-save">
<div id="icon-upload" class="icon32"><br></div><h2 style="color:#2680AA;">WPvote Youtube Custom player Options</h2>
</div>
<div class="wp-vote-wrap-head">
<div class="wp-vote-name" onclick="javascript:Wpvote_showHide('wpvote-main');"><h3>Customize your youtube player settings</h3></div>
</div>
<div class="wp-vote-wrap"  id="wpvote-main">
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<div class="usage-wp">
<div class="form-wp">
	<label for="display_wpvote_tube_pl">Display type : </label>
     <select name="display_wpvote_tube_type" id="display_wpvote_tube_type" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_type') == 1) echo 'selected="Embed"'; ?> >Embed</option>
	 <option value="2" <?php if (get_option('display_wpvote_tube_type') == 2) echo 'selected="Iframe"'; ?> >Iframe</option>
 </select>
     <p class="helpwp">Choose the way of showing video.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_pl">Enable Widget : </label>
     <select name="display_wpvote_tube_widget" id="display_wpvote_tube_widget" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_widget') == 1) echo 'selected="Enable"'; ?> >Enable</option>
	 <option value="2" <?php if (get_option('display_wpvote_tube_widget') == 2) echo 'selected="Disable"'; ?> >Disable</option>
 </select>
     <p class="helpwp">Enable or disable featured YouTube widget.</p>
</div>
 <div class="usagewp">
<b><i>Usage:</i></b><br /> When you paste a video adress like: <b><br /><i>http://youtu.be/xCBzNl9M15M <br />http://www.youtube.com/watch?v=8y4vIzEkd6s</i> </b><br />
Set this adress like this :<b><br /><i>httpv://youtu.be/xCBzNl9M15M <br />httpv://www.youtube.com/watch?v=8y4vIzEkd6s</i> </b> <br />
Add "v" after http and that it is it :)<br /> Or just add youtube id like this: <br /><b><i>[wtube] xCBzNl9M15M [/wtube]</i></b>
<br /><br /><b><i>Usage featured widget:</i></b><br />
Just paste a video adress like: <b><br /><i>http://youtu.be/xCBzNl9M15M <br />http://www.youtube.com/watch?v=8y4vIzEkd6s</i> </b><br /> or shorcode YouTube id like this: <b>xCBzNl9M15M</b><br /> Each widget has the individual settings for your video and they are the same for the plugin itself. <br />and that it is it :)
</div></div>

<div class="form-wp">
	<label for="display_wpvote_tube_width">Width: </label>
	<input name="display_wpvote_tube_width" id="display_wpvote_tube_width" value="<?php echo get_option('display_wpvote_tube_width'); ?>" size="10"  class="wp-in" type="text">&nbsp;<i>px</i>
	<p class="helpwp">Set width of player.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_height">Height: </label>
	<input type="text" name="display_wpvote_tube_height" id="display_wpvote_tube_height" value="<?php echo get_option('display_wpvote_tube_height'); ?>" size="10"  class="wp-in" type="text">&nbsp;<i>px</i>
	<p class="helpwp">Set height of player..</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_theme">Player theme: </label>
     <select name="display_wpvote_tube_theme" id="display_wpvote_tube_theme" class="wpv-select">
     <option value="dark" <?php if (get_option('display_wpvote_tube_theme') =='dark') echo 'selected="Dark"'; ?> >Dark </option>
	 <option value="light" <?php if (get_option('display_wpvote_tube_theme') == 'light') echo 'selected="Light"'; ?> >Light </option>
     </select>
     <p class="helpwp">Choose theme.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_full">Fullscreen: </label>
     <select name="display_wpvote_tube_full" id="display_wpvote_tube_full" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_full') == '1') echo 'selected="Enable"'; ?> >Enable </option>
	 <option value="0" <?php if (get_option('display_wpvote_tube_full') == '0') echo 'selected="Disable"'; ?> >Disable </option>
     </select>
     <p class="helpwp">Enable or disable fullscreen.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_info">Show info: </label>
     <select name="display_wpvote_tube_info" id="display_wpvote_tube_info" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_info')== 1) echo 'selected="Enable"'; ?> >Enable </option>
	 <option value="0" <?php if (get_option('display_wpvote_tube_info') == 0) echo 'selected="Disable"'; ?> >Disable </option>
     </select>
     <p class="helpwp">Enable or disable video title.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_controle">Show controls: </label>
     <select name="display_wpvote_tube_controle" id="display_wpvote_tube_controle" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_controle') == 1) echo 'selected="Enable"'; ?> >Enable </option>
	 <option value="0" <?php if (get_option('display_wpvote_tube_controle') == 0) echo 'selected="Disable"'; ?> >Disable </option>
     </select>
     <p class="helpwp">Enable or disable video nav. bar.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_rel">Related video: </label>
     <select name="display_wpvote_tube_rel" id="display_wpvote_tube_rel" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_rel')  == 1) echo 'selected="Enable"'; ?> >Enable </option>
	 <option value="0" <?php if (get_option('display_wpvote_tube_rel') == 0) echo 'selected="Disable"'; ?> >Disable </option>
     </select>
     <p class="helpwp">Enable or disable related video.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_pl">Autoplay video: </label>
     <select name="display_wpvote_tube_pl" id="display_wpvote_tube_pl" class="wpv-select">
     <option value="1" <?php if (get_option('display_wpvote_tube_pl') == 1) echo 'selected="Enable"'; ?> >Enable </option>
	 <option value="0" <?php if (get_option('display_wpvote_tube_pl') == 0) echo 'selected="Disable"'; ?> >Disable </option>
     </select>
     <p class="helpwp">Enable or disable autoplay video.</p>
</div>
<div class="form-wp">
	<label for="display_wpvote_tube_css">Css class: </label>
	<input name="display_wpvote_tube_css" id="display_wpvote_tube_css" value="<?php echo get_option('display_wpvote_tube_css'); ?>" size="10"  class="wp-in" type="text">&nbsp;<i>name.</i>
	<p class="helpwp">Optional, if need to customize position of player or something.</p>
</div>
 <br /><hr style=" border:#2680AA 1px solid;">

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="<?php echo esc_attr( implode( ',', $options_to_wpvote ) ); ?>" />
<button type="submit" class="button-secondary"><?php _e('Save Changes') ?></button>
</form>
</div>

<!-- WP VOTE -->
<div class="wp-vote-wrap-head">
<div class="wp-vote-name" onclick="javascript:Wpvote_showHide('wpvote-help');"><h3>WPvote plugin about</h3></div>
</div>
<div class="wp-vote-wrap" id="wpvote-help">

  <ul>
  <li><b>Name:</b> WP Youtube Custom</li>
  <li><b>Plugin URI:</b> <a href="http://www.wpvote.me/wpvote-youtube-custom-player-wordpress" target="_blank">http://www.wpvote.me/wpvote-youtube-custom-player-wordpress</a></li>
  <li><b>Version:</b> 1.3</li>
  <li><b>Author:</b> <a href="http://www.wpvote.me">www.wpvote.me</a></li>
  </ul>
  <p>For all additional questions and ideas you can contact us <a href="http://www.wpvote.me/contact-us/" target="_blank"><b>here</b></a>.<br /> Feel free to visit our website and look for the plugins you are interested.</p>
<br /><hr style=" border:#2680AA 1px solid;">
<br />
<a name="fb_share" type="icon_link"  share_url="http://www.wpvote.me">Share us on Facebook</a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</div>
<!-- WPVOTE END -->
</div>
<?php }
function youtubeCodeCustom( $Yvideo ){
    /* Youtube options */
    $TYdusiplay=get_option('display_wpvote_tube_type');
    $WIisplay=strip_tags(stripslashes(get_option('display_wpvote_tube_width')));
    $HEdisplay=strip_tags(stripslashes(get_option('display_wpvote_tube_height')));
    $FUdisplay=get_option('display_wpvote_tube_full');
    $INFdisplay=get_option('display_wpvote_tube_info');
    $RELdisplay=get_option('display_wpvote_tube_rel');
    $AUdisplay=get_option('display_wpvote_tube_pl');
    $CONdisplay=get_option('display_wpvote_tube_controle');
    $THEMEdisplay=get_option('display_wpvote_tube_theme');
    $CSSdsiplay=strip_tags(stripslashes(get_option('display_wpvote_tube_css')));
    if($FUdisplay==1){$FUdisplay1='true';}
    if($FUdisplay==0){$FUdisplay1='false';}
    if ($CSSdsiplay ==""){$div1=""; $div2="";}else{$div1='<div class="'.$CSSdsiplay.'">';$div2='</div>';}
	$text.="\n<!-- ".__("Start WPvote Youtube Custom player")." -->\n";
    if ($TYdusiplay==1){$text.=$div1.'<object width="'.$WIisplay.'" height="'.$HEdisplay.'"><param name="movie" value="http://www.youtube.com/v/'.$Yvideo.'?fs='.$FUdisplay.'&amp;hl=en_US&amp;iv_load_policy=3&amp;showinfo='.$INFdisplay.'&amp;controls='.$CONdisplay.'&amp;autoplay='.$AUdisplay.'&amp;rel='.$RELdisplay.'&amp;theme='.$THEMEdisplay.'&amp;autohide=1&amp;version=3"></param><param name="allowFullScreen" value="'.$FUdisplay1.'"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'.$Yvideo.'?fs='.$FUdisplay.'&amp;hl=en_US&amp;iv_load_policy=3&amp;showinfo='.$INFdisplay.'&amp;controls='.$CONdisplay.'&amp;autoplay='.$AUdisplay.'&amp;rel='.$RELdisplay.'&amp;theme='.$THEMEdisplay.'&amp;autohide=1&amp;version=3" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="'.$FUdisplay1.'" width="'.$WIisplay.'" height="'.$HEdisplay.'"></embed></object>'.$div2;}
    if ($TYdusiplay==2){$text.=$div1.'<iframe width="'.$WIisplay.'" height="'.$HEdisplay.'" src="http://www.youtube.com/embed/'.$Yvideo.'?fs='.$FUdisplay.'&amp;hl=en_US&amp;iv_load_policy=3&amp;showinfo='.$INFdisplay.'&amp;controls='.$CONdisplay.'&amp;autoplay='.$AUdisplay.'&amp;rel='.$RELdisplay.'&amp;theme='.$THEMEdisplay.'&amp;autohide=1&amp;version=3" frameborder="0" allowfullscreen></iframe>'.$div2;}
    $text.="\n<!-- ".__("End of WPvote Youtube Custom player")." -->\n";
	return $text;}
function display_wpvote_youtube($content = '') {
    /* Find video and replace with you player*/
    if (strpos($content, "httpv") !== false  ) {
    $urls = array(
    '/httpv:\/\/www.youtube.com\/watch\?v=([a-zA-Z0-9_-]+)([%&=#a-zA-Z0-9_-])*/',
    '/httpv:\/\/www.youtube.com\/watch#\!v=([a-zA-Z0-9_-]+)([%&=#a-zA-Z0-9_-])*/',
    '/httpv:\/\/youtu.be\/([a-zA-Z0-9_-]+)/',
    '|\[wtube\](.+?)(,(.+?))?\[/wtube\]|i',
    );
    $content= preg_replace($urls,youtubeCodeCustom('$1'),$content);
    }
    if (strpos($content, "[wtube") !== false  ) {
    $urls = array(
    '|\[wtube\](.+?)(,(.+?))?\[/wtube\]|i',
    );
    $content= preg_replace($urls,youtubeCodeCustom('$1'),$content);
    }


return $content;
}


function install_wpvote_youtube($args)
	{
		foreach ($args as $name => $value) {
			add_option($name,$value,'','no');
		}
	}

	function wpvote_youtube_activation () {
		$options = array(
		'display_wpvote_tube_width' => '450',
		'display_wpvote_tube_height' => '259',
		'display_wpvote_tube_full' => '1',
		'display_wpvote_tube_info' => '1',
		'display_wpvote_tube_rel' => '1',
		'display_wpvote_tube_pl' => '0',
		'display_wpvote_tube_controle' => '1',
		'display_wpvote_tube_theme' => 'dark',
        'display_wpvote_tube_type' => '1',
        'display_wpvote_tube_widget'=>'2',
		);
		install_wpvote_youtube($options);

	}
register_activation_hook(__FILE__,'wpvote_youtube_activation');

	function wpvote_youtube_deactivation_delete_options($args)
	{
		$num = count($args);
		if ($num == 1) {
			delete_option($args[0]);
		}
		elseif (count($args) > 1)
		{
			foreach ($args as $option) {
				delete_option($option);
			}
		}
	}

	function wpvote_youtube_deactivation () {
		$options = array(
    'display_wpvote_tube_width',
    'display_wpvote_tube_height',
    'display_wpvote_tube_full',
    'display_wpvote_tube_info',
    'display_wpvote_tube_rel',
    'display_wpvote_tube_pl',
    'display_wpvote_tube_controle',
    'display_wpvote_tube_theme',
    'display_wpvote_tube_type',
    'display_wpvote_tube_widget'
	);
	wpvote_youtube_deactivation_delete_options($options);
	}
	register_deactivation_hook(__FILE__,'wpvote_youtube_deactivation');
   /* call widget*/
   $WPvoteVWIDGET=get_option('display_wpvote_tube_widget');
   if($WPvoteVWIDGET==1){
   include ''.WPVOTEY_DIR.'/wpvote-youtube-widget.php';
   }
?>