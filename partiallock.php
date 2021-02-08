<?php
/*
Plugin Name: partiallocl
Plugin URI: https://github.com/JKooll
Description: Encrypt part of the content of the article.
Version: 1.0
Author: JKol
Author URI: https://github.com/JKooll
*/
function e_secret($atts, $content=null) {
	extract(shortcode_atts(array('key' => null, 'tip' => null), $atts));
	if (
		isset($_SESSION[hash('md5', $key)]) ||
		(isset($_POST['e_secret_key']) && $_POST['e_secret_key'] == $key)
	) {
		$_SESSION[hash('md5', $key)] = $key;
		return '<div class="e-secret">' . $content . '</div>';
	} else {
		if (isset($_POST['e_secret_key'])) {
			$tip = '<p class="secret_tip">Please enter the correct password!</p>' . $tip;
		}
		return '<form class="e-secret" action="'.get_permalink().'" method="post" name="e-secret"><label>Enter the password to view the encrypted content:</label><input type="password" name="e_secret_key" class="euc-y-i" maxlength="50"><input type="submit" class="euc-y-s" value="确定">
      <div class="euc-clear"></div></form>' . '<p class="secret_tip">' . $tip . '</p>';
	}
}
add_shortcode('secret', 'e_secret');

function register_session(){
    if( !session_id() )
        session_start();
}
add_action('init','register_session');

function add_style() {
  wp_register_style("partiallock", plugins_url("partiallock/style.css"));
  wp_enqueue_style("partiallock");
}
add_action('wp_enqueue_scripts', 'add_style' );
?>
