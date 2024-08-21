<?php 

/**
 * plugin name: Version Asset Plugin
 * Description: This plugin can version change
 * Version: 1.0.2
 * Url: https://github.com/
 * 
 */
include_once(ABSPATH . 'wp-admin/includes/Plugin.php');  // include kore niye aste hbe 
 class vap_version_asset_plugin {
     public function __construct() {
          add_action('init', array($this, 'init'));
     }

     public function init() {
          add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
     }

     public function load_scripts() {
          $plugin_data = get_plugin_data(__FILE__);     // version path 
          $plugin_version = $plugin_data['Version'];
          
          $version_path = plugin_dir_url(__FILE__);   
          $js_path = $version_path . 'js/';

          wp_enqueue_script('version_change_js', $js_path . 'index.js' , [],  $plugin_version , true);
          
     }
 }
 new vap_version_asset_plugin();