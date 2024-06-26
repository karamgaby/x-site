<?php
/**
 * Class SpeedLimitRevisionsTest
 *
 * @package X_Core
 */

class SpeedLimitRevisionsTest extends WP_UnitTestCase {

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

  public function test_speed_limit_revisions() {
    $class = $this->speed->get_sub_features()['x_core_speed_limit_revisions'];
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

    // check filter hook
    $this->assertSame(
      10, has_filter('wp_revisions_to_keep', array($class, 'x_core_limit_revision_number'))
    );

    // X_CORE_LIMIT_REVISION_NUMBER()

    // mock args
    $number = 20;
    $post_id = 1;

    // check that the callback function returns correct values
    $this->assertSame(
      10, $class->x_core_limit_revision_number($number, $post_id)
    );
  }

}
