<?php
/**
 * Class Plugins_Redirection
 */
class X_Core_Plugins_Redirection extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_plugins_redirection');

    // var: name
    $this->set('name', 'Settings for the Redirection plugin');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {
    add_filter('redirection_role', array($this, 'x_core_redirection_role'));
  }

  /**
   * Grant everybody that can publish pages (admin and editors) access to Redirection plugin
   */
  public static function x_core_redirection_role() {
    return 'publish_pages';
  }

}
