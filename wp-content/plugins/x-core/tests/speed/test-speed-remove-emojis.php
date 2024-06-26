<?php
/**
 * Class SpeedRemoveEmojisTest
 *
 * @package X_Core
 */

class SpeedRemoveEmojisTest extends WP_UnitTestCase {

  private $speed;

  public function setUp() {
    parent::setUp();
    $this->speed = new X_Core_Speed;
  }

  public function tearDown() {
    unset($this->speed);
    parent::tearDown();
  }

  // test speed sub feature

  public function test_speed_remove_emojis() {
    $class = $this->speed->get_sub_features()['x_core_speed_remove_emojis'];
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

    // check action hook
    $this->assertSame(
      10, has_action('init', array($class, 'x_core_disable_emojis'))
    );

    // X_CORE_DISABLE_EMOJIS()

    // run callback function
    $class->x_core_disable_emojis();

    // check that the filter and action hooks have been removed
    $this->assertFalse(
      has_action('wp_head', 'print_emoji_detection_script', 7)
    );
    $this->assertFalse(
      has_action('admin_print_scripts', 'print_emoji_detection_script')
    );
    $this->assertFalse(
      has_action('wp_print_styles', 'print_emoji_styles')
    );
    $this->assertFalse(
      has_action('admin_print_styles', 'print_emoji_styles')
    );
    $this->assertFalse(
      has_filter('the_content_feed', 'wp_staticize_emoji')
    );
    $this->assertFalse(
      has_filter('comment_text_rss', 'wp_staticize_emoji')
    );
    $this->assertFalse(
      has_filter('wp_mail', 'wp_staticize_emoji_for_email')
    );
  }

}
