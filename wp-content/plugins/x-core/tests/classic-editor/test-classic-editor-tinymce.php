<?php
/**
 * Class ClassicEditorTinymceTest
 *
 * @package X_Core
 */

class ClassicEditorTinymceTest extends WP_UnitTestCase {

  private $ce;

  public function setUp() {
    parent::setUp();
    $this->ce = new X_Core_Classic_Editor;
  }

  public function tearDown() {
    unset($this->ce);
    parent::tearDown();
  }

  // test CE sub feature

  public function test_classic_editor_tinymce() {
    $class = $this->ce->get_sub_features()['x_core_classic_editor_tinymce'];
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
      10, has_filter('tiny_mce_before_init', array($class, 'x_core_show_second_editor_row'))
    );

    // X_CORE_SHOW_SECOND_EDITOR_ROW()

    // mock args
    $args = array('wordpress_adv_hidden' => true);

    // check that the callback function returns correct value
    $this->assertFalse(
      $class->x_core_show_second_editor_row($args)['wordpress_adv_hidden']
    );
  }

}
