<?php
/**
 * Class Plugins_Seo
 */
class X_Core_Plugins_Seo extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_plugins_seo');

    // var: name
    $this->set('name', 'Settings for the SEO plugin');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {
    add_action('wp_before_admin_bar_render', array($this, 'x_core_yoast_admin_bar_render'));
  }

  /**
   * Remove "SEO" from admin bar
   *
   * @global WP_Admin_Bar $wp_admin_bar the admin bar
   */
  public static function x_core_yoast_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wpseo-menu');
  }

}
