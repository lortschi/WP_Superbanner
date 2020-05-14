<?php
/*
Plugin Name: Superbanner
Plugin URI: https://deluxefitness.de
Description: Superbanner
Version: 1.0
Author: VajdaMedia
Author URI: https://vajda-media.co.uk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_filter('xmlrpc_enabled', '__return_false');
/*add_action( 'wp_dashboard_setup', 'superbanner' );
function superbanner() {
	wp_add_dashboard_widget( 'dw_dashboard_widget_news', __( 'CSSIgniter News', 'dw' ), 'dw_dashboard_widget_news_handler', 'dw_dashboard_widget_news_config_handler' );
}*/

/*add_action('admin_menu', 'superbanner');

function superbanner() {
	add_menu_page( 'Superbanner', 'Superbanner', 'manage_options', 'superbanner', 'superbanner_config_handler' );

	//call register settings function
	add_action( 'admin_init', 'register_superbanner_plugin_settings' );
}

function register_superbanner_cool_plugin_settings() {
	//register our settings
	register_setting( 'extra-post-info-settings', 'superbanner_appointmentassistent_link' );
	register_setting( 'extra-post-info-settings', 'superbanner_phonenumber' );
	//register_setting( 'superbanner-plugin-settings-group', 'option_etc' );
}
 
function superbanner_config_handler() {
?>


<form method="post" action="options.php">     
	<?php settings_fields( 'extra-post-info-settings' ); ?>     
	<?php do_settings_sections( 'extra-post-info-settings' ); ?> 
	<div style="display: flex; flex-direction: column; width: 650px; margin-top: 30px;">
		<div>
			<p style="font-size: 16px;">Superbanner Config Plugin</p>
		</div>
		<p>
			<label><?php _e( 'Superbanner Terminkalender Link:', 'dw' ); ?>
				<input type="text" name="superbanner_appointmentassistent_link" size="50" value="<?php echo get_option( 'superbanner_appointmentassistent_link' ); ?>" />
			</label>
		</p>
		<p>
			<label><?php _e( 'Superbanner Telefonnummer:', 'dw' ); ?>
				<input type="text" name="superbanner_phonenumber" size="50" value="<?php echo get_option( 'superbanner_phonenumber' ); ?>" />
			</label>
		</p>
	</div>
	<?php submit_button(); ?>   
</form> 
<?php
}

add_action( 'admin_enqueue_scripts', 'dw_scripts' );
function dw_scripts( $hook ) {
	$screen = get_current_screen();
	if ( 'toplevel_page_superbanner' === $screen->id ) {
		wp_enqueue_script( 'dw_script', plugin_dir_url(__FILE__) . 'js/superbanner.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'dw_style', plugin_dir_url(__FILE__) . 'js/superbanner.css', array(), '1.0' );
	}
	//var_dump($screen);
}

?>*/



// create custom plugin settings menu
add_action('admin_menu', 'superbanner_plugin_create_menu');

add_action( 'admin_enqueue_scripts', 'dw_scripts' );

function superbanner_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('Superbanner', 'Superbanner', 'administrator', __FILE__, 'superbanner_plugin_settings_page' , plugins_url('../../gallery/superbanner.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_superbanner_plugin_settings' );
}


function register_superbanner_plugin_settings() {
	//register settings
	register_setting( 'superbanner-plugin-settings-group', 'superbanner_bg_colorpick' );
	register_setting( 'superbanner-plugin-settings-group', 'superbanner_text_colorpick' );
	register_setting( 'superbanner-plugin-settings-group', 'superbanner_header_text' );
	register_setting( 'superbanner-plugin-settings-group', 'superbanner_switch' );
}

function superbanner_plugin_settings_page() {
?>
<form class="superbanner_settings_form" method="post" action="options.php">
	<?php settings_fields( 'superbanner-plugin-settings-group' ); ?>
	<?php do_settings_sections( 'superbanner-plugin-settings-group' ); ?>
	<div class="superbanner_settings_top">
		<h2 style="margin-top: 30px;">Superbanner Settings</h2>
		<div>VajdaMedia Vers. 1.0</div>
	</div>
	<div class="superbanner_settings_wrapper">
		<table class="form-table">
			<tr valign="top">
			<th scope="row">Superbanner Background Color</th>
			<td><input type="text" class="mm-color-picker" name="superbanner_bg_colorpick" value="<?php echo get_option('superbanner_bg_colorpick'); ?>" /></td>
			</tr>

			<tr valign="top">
			<th scope="row">Superbanner Text Color</th>
			<td><input type="text" class="mm-color-picker" name="superbanner_text_colorpick" value="<?php echo get_option('superbanner_text_colorpick'); ?>" /></td>
			</tr>

			<tr valign="top">
			<th scope="row">Superbanner Header Text</th>
			<td><textarea cols="100" name="superbanner_header_text"><?php echo esc_attr( get_option('superbanner_header_text') ); ?></textarea></td>
			</tr>

			<tr valign="top">
			<th scope="row">Superbanner Visibility</th>
			<td><input class="superbanner_switch_checkbox" type="checkbox" name="superbanner_switch" value="1" <?php checked( '1', get_option( 'superbanner_switch' ) ); ?> /></td>
			</tr>
		</table>
	</div>
	<?php submit_button(); ?>
</form>
<?php } 

function dw_scripts( $hook ) {
	$screen = get_current_screen();
	//if ( 'toplevel_page_superbanner' === $screen->id ) {
		wp_enqueue_script( 'dw_script', plugin_dir_url(__FILE__) . 'js/superbanner.js', array( 'jquery', 'wp-color-picker' ), '1.0', true );
		wp_enqueue_style( 'dw_style', plugin_dir_url(__FILE__) . 'css/superbanner.css', array(), '1.0' );
	//}
}
?>
