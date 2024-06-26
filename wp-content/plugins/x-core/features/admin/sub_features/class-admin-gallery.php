<?php
/**
 * Class Admin_Gallery
 */
class X_Core_Admin_Gallery extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_admin_gallery');

    // var: name
    $this->set('name', 'Gallery settings');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {
    add_filter('media_view_settings', array($this, 'x_core_gallery_defaults'));
  }

  /**
   * Default gallery links to file, size to medium and columns to 2
   *
   * @param array $settings list of media view settings
   *
   * @return array of media view settings
   */
  public static function x_core_gallery_defaults($settings) {
    $settings['galleryDefaults']['link']    = 'file';
    $settings['galleryDefaults']['size']    = 'medium';
    $settings['galleryDefaults']['columns'] = '2';

    return $settings;
  }

}
