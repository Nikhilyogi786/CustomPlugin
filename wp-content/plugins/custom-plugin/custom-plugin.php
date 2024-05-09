<?php
/*
 * Plugin Name: Custom Plugin
 * Description: This is a sample plugin to learn.
 * Plugin URI: https://example.com/custom-plugin
 * Author: Sample User
 * Author URI: https://example.com
 * Version: 1.0
 * Requires at least: 6.5.2
 * Requires PHP: 7.4 / 8.3
 */

class Custom_Plugin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
    }

    public function add_admin_menu() {
        add_menu_page( 'Custom Plugin Menu', 'Custom Plugin', 'manage_options', 'cp_plugin', array( $this, 'plugin_page' ) );
    }

    public function plugin_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <p>This is a custom plugin page.</p>
        </div>
        <?php
    }

}

// Instantiate the plugin class
$custom_plugin = new Custom_Plugin();

// Privacy Notice
function cp_privacy_notice() {
    echo '<div class="updated"><p>This plugin collects some data to provide its functionality. For more information, please review our <a href="#">privacy policy</a>.</p></div>';
}
add_action( 'admin_notices', 'cp_privacy_notice' );
