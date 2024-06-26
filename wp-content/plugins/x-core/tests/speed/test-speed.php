<?php
/**
 * Class SpeedTest
 *
 * @package X_Core
 */

class SpeedTest extends WP_UnitTestCase {

  private $speed;

  public function setUp() {
    parent::setUp();
    $this->speed = new X_Core_Speed;
  }

  public function tearDown() {
    unset($this->speed);
    parent::tearDown();
  }

  // test speed feature

  public function test_speed() {
    $class = $this->speed;
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

    // sub feature init
    $this->assertNotEmpty(
      $class->get_sub_features()
    );
  }

}
