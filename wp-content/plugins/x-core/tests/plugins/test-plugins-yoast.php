<?php
/**
 * Class PluginsYoastTest
 *
 * @package X_Core
 */

class PluginsYoastTest extends WP_UnitTestCase {

  private $plugins;

  public function setUp() {
    parent::setUp();
    $this->plugins = new X_Core_Plugins;
  }

  public function tearDown() {
    unset($this->plugins);
    parent::tearDown();
  }

  // test plugins sub feature

  public function test_plugins_yoast() {
    $class = $this->plugins->get_sub_features()['x_core_plugins_yoast'];
    // key
    $this->assertNotEmpty(
       $class->get_key()
    );
    // name
    $this->assertNotEmpty(
      $class->get_name()
    );
    // status
    $this->assertTrue(
      $class->is_active()
    );

    /**
     * Run
     */

    // check action and filter hooks
    $this->assertSame(
      10, has_action('admin_init', array($class, 'x_core_remove_wpseo_notifications'))
    );
    $this->assertSame(
      10, has_filter('wpseo_metabox_prio', array($class, 'x_core_seo_metabox_prio'))
    );
    $this->assertSame(
      10, has_filter('the_seo_framework_metabox_priority', array($class, 'x_core_seo_metabox_prio'))
    );
    $this->assertSame(
      5, has_filter('wpseo_opengraph_image_size', array($class, 'x_core_filter_wpseo_opengraph_image_size'))
    );
    $this->assertSame(
      5, has_filter('wpseo_twitter_image_size', array($class, 'x_core_filter_wpseo_opengraph_image_size'))
    );

    // X_CORE_REMOVE_WPSEO_NOTIFICATIONS()

    // mock actions
    add_action('admin_notices', array(Yoast_Notification_Center::get(), 'display_notifications'));
    add_action('all_admin_notices', array(Yoast_Notification_Center::get(), 'display_notifications'));

    // run callback function
    $class->x_core_remove_wpseo_notifications();

    // check that actions are removed
    $this->assertFalse(
      has_action('admin_notices', array(Yoast_Notification_Center::get(), 'display_notifications'))
    );
    $this->assertFalse(
      has_action('all_admin_notices', array(Yoast_Notification_Center::get(), 'display_notifications'))
    );

    // X_CORE_SEO_METABOX_PRIO()

    // mock args
    $priority = 'high';

    // check that the return value is correct
    $this->assertSame(
      'low', $class->x_core_seo_metabox_prio($priority)
    );

    // X_CORE_FILTER_WPSEO_OPENGRAPH_IMAGE_SIZE()

    // mock args
    $size = 'small';

    // check that the return value is correct
    $this->assertSame(
      'large', $class->x_core_filter_wpseo_opengraph_image_size($size)
    );
  }

}

// test double required in the test_plugins_yoast function
class Yoast_Notification_Center {

  private static $instance = null;

  public static function get() {
    if ( null === self::$instance ) {
      self::$instance = new self();
		}

    return self::$instance;
  }
}
