<?php
/**
 * Class Security_Disable_File_Edit
 */
class X_Core_Security_Disable_File_Edit extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_security_disable_file_edit');

    // var: name
    $this->set('name', 'Disables editing of files from the dashboard');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {

    if (!defined('DISALLOW_FILE_EDIT')) {
      define('DISALLOW_FILE_EDIT', !WP_DEBUG);
    }

  }

}
