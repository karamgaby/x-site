<?php
/**
 * Class Admin_Profile_Cleanup
 */
class X_Core_Admin_Profile_Cleanup extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_admin_profile_cleanup');

    // var: name
    $this->set('name', 'Remove admin color scheme picker and profile contact methods');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {
    remove_all_actions('admin_color_scheme_picker');
    add_filter( 'user_contactmethods', array($this, 'x_core_remove_contact_methods'), 10, 1 );
  }

  /**
   * Remove profile contact methods
   *
   * @param array $contact available contact methods
   *
   * @return array available contact methods
   */
  public static function x_core_remove_contact_methods($contact) {
    unset($contact['aim']);
    unset($contact['jabber']);
    unset($contact['yim']);
    unset($contact['googleplus']);
    unset($contact['twitter']);
    unset($contact['facebook']);

    return $contact;
  }

}
