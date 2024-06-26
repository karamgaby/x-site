<?php
/**
 * Class Security_Remove_Commenting
 */
class X_Core_Security_Remove_Commenting extends X_Core_Sub_Feature {

  public function setup() {

    // var: key
    $this->set('key', 'x_core_security_remove_commenting');

    // var: name
    $this->set('name', 'Remove commenting');

    // var: is_active
    $this->set('is_active', true);

  }

  /**
   * Run feature
   */
  public function run() {

    add_action('admin_init', array($this, 'x_core_disable_comments_post_types_support'));
    add_action('admin_menu', array($this, 'x_core_disable_comments_admin_menu'));
    add_action('admin_init', array($this, 'x_core_disable_comments_admin_menu_redirect'));
    add_action('admin_init', array($this, 'x_core_disable_comments_dashboard'));
    add_action('wp_before_admin_bar_render', array($this, 'x_core_admin_bar_render'));

    add_filter('comments_array', array($this, 'x_core_disable_comments_hide_existing_comments', 10, 2));

    // close comments on the front-end
    add_filter('comments_open', '__return_false', 20);
    add_filter('pings_open',    '__return_false', 20);

  }

  /**
   * Disable support for comments and trackbacks in post types
   */
  public static function x_core_disable_comments_post_types_support() {

    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
      if (post_type_supports($post_type, 'comments')) {
        remove_post_type_support($post_type, 'comments');
        remove_post_type_support($post_type, 'trackbacks');
      }
    }

  }

  /**
   * Hide existing comments
   *
   * @param array $comments existing comments
   *
   * @return empty array
   */
  public static function x_core_disable_comments_hide_existing_comments($comments) {

    return array();

  }

  /**
   * Remove comments page in menu
   */
  public static function x_core_disable_comments_admin_menu() {

    remove_menu_page('edit-comments.php');

  }

  /**
   * Redirect any user trying to access comments page
   */
  public static function x_core_disable_comments_admin_menu_redirect() {

    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
      wp_redirect(admin_url());
      exit;
    }

  }

  /**
   * Remove comments metabox from dashboard
   */
  public static function x_core_disable_comments_dashboard() {

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

  }

  /**
   * Remove comments links from admin bar
   *
   * @global WP_Admin_Bar $wp_admin_bar the admin bar
   */
  public static function x_core_admin_bar_render() {

    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');

  }

}
