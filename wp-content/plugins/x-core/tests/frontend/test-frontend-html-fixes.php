<?php
/**
 * Class FrontEndHtmlFixesTest
 *
 * @package X_Core
 */

class FrontEndHtmlFixesTest extends WP_UnitTestCase {

  private $front_end;

  public function setUp() {
    parent::setUp();
    $this->front_end = new X_Core_Front_End;
  }

  public function tearDown() {
    unset($this->front_end);
    parent::tearDown();
  }

  // test front end sub feature

  public function test_front_end_html_fixes() {
    $class = $this->front_end->get_sub_features()['x_core_front_end_html_fixes'];
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

    // check filter hooks
    $this->assertSame(
      10, has_filter('next_posts_link_attributes', array($class, 'x_core_next_posts_attributes'))
    );
    $this->assertSame(
      10, has_filter('script_loader_tag', array($class, 'x_core_cleanup_script_tags'))
    );

    // X_CORE_NEXT_POSTS_ATTRIBUTES()

    // check that the return value contains correct string
    $this->assertContains(
      ' itemprop="relatedLink/pagination" ', $class->x_core_next_posts_attributes('')
    );

    // X_CORE_CLEANUP_SCRIPT_TAGS()

    // mock args
    $tag1 = "type='text/javascript' ";
    $tag2 = 'type="text/javascript" ';
    $tag3 = 'Test ';

    // check that the strings has been removed
    $this->assertEmpty(
      $class->x_core_cleanup_script_tags($tag1)
    );
    $this->assertEmpty(
      $class->x_core_cleanup_script_tags($tag2)
    );
    $this->assertNotEmpty(
      $class->x_core_cleanup_script_tags($tag3)
    );

  }

}
