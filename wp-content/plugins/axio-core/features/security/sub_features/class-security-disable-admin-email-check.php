<?php
/**
 * Class Disable_Admin_Email_Check
 */
class Axio_Core_Security_Disable_Admin_Email_Check extends Axio_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'axio_core_security_disable_admin_email_check');

    // var: name
    $this->set('name', 'Disables the admin email check');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {

    add_filter('admin_email_check_interval', '__return_false');

  }
}
