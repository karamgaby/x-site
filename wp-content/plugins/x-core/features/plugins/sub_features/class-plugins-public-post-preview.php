<?php
/**
 * Class Plugins_Public_Post_Preview
 */
class X_Core_Plugins_Public_Post_Preview extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_plugins_public_post_preview');

    // var: name
    $this->set('name', 'Settings for the Public Post Preview plugin');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {

    add_filter('ppp_nonce_life', array($this, 'x_core_ppp_nonce_life'), 10, 1);

  }

  /**
   * Extend preview time for full uear
   *
   * @param int $nonce_life the nonce life
   *
   * @return int  the filtered nonce life
   */
  public static function x_core_ppp_nonce_life($expire_in_seconds) {

    return YEAR_IN_SECONDS;

  }

}
