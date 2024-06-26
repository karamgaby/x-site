<?php
/**
 * Plugin Name:    X Core
 * Description:    Core functionality to X Starter powered sites
 * Version:        1.1.2
 * Author:         Generx_coren
 * Author URI:     https://www.generx_coren.com
 * Text Domain:    x_core-core
 */

// constant: version for cache busting etc
define('X_CORE_VERSION', '1.1.2');

// constant: plugin's root directory (used in some sub_features)
define('X_CORE_DIR', plugins_url('', __FILE__));


class X_Core {

  // var: active instance of class
  private static $instance;

  public function __construct() {

    /* Helper functions
    ----------------------------------------------- */

    require_once 'helpers.php';

    /* Abstract classes
    ----------------------------------------------- */

    require_once 'abstract-feature.php';
    require_once 'abstract-sub-feature.php';

    /* Features for action: plugins_loaded
    ----------------------------------------------- */

    // polyfills
    require_once 'features/polyfills/class-polyfills.php';
    require_once 'features/polyfills/sub_features/class-polyfills-acf.php';
    require_once 'features/polyfills/sub_features/class-polyfills-polylang.php';

    // localization
    require_once 'features/localization/class-localization.php';
    require_once 'features/localization/sub_features/class-localization-string-translations.php';

    // initialize features
    $features = array(
      'x_core_polyfills'      => new X_Core_Polyfills,
      'x_core_localization'   => new X_Core_Localization,

    );

    /* Features for action: after_setup_theme
    ----------------------------------------------- */

    add_action('after_setup_theme', function() {

      // admin
      require_once 'features/admin/class-admin.php';
      require_once 'features/admin/sub_features/class-admin-front-page-edit-link.php';
      require_once 'features/admin/sub_features/class-admin-gallery.php';
      require_once 'features/admin/sub_features/class-admin-image-link.php';
      require_once 'features/admin/sub_features/class-admin-login.php';
      require_once 'features/admin/sub_features/class-admin-menu-cleanup.php';
      require_once 'features/admin/sub_features/class-admin-notifications.php';
      require_once 'features/admin/sub_features/class-admin-profile-cleanup.php';

      // classic-editor
      require_once 'features/classic-editor/class-classic-editor.php';
      require_once 'features/classic-editor/sub_features/class-editor-tinymce.php';

      // dashboard
      require_once 'features/dashboard/class-dashboard.php';
      require_once 'features/dashboard/sub_features/class-dashboard-cleanup.php';
      require_once 'features/dashboard/sub_features/class-dashboard-recent-widget.php';
      require_once 'features/dashboard/sub_features/class-dashboard-remove-panels.php';

      // debug
      require_once 'features/debug/class-debug.php';
      require_once 'features/debug/sub_features/class-debug-style-guide.php';
      require_once 'features/debug/sub_features/class-debug-wireframe.php';

      // front-end
      require_once 'features/front-end/class-front-end.php';
      require_once 'features/front-end/sub_features/class-front-end-html-fixes.php';

      // plugins
      require_once 'features/plugins/class-plugins.php';
      require_once 'features/plugins/sub_features/class-plugins-acf.php';
      require_once 'features/plugins/sub_features/class-plugins-cookiebot.php';
      require_once 'features/plugins/sub_features/class-plugins-redirection.php';
      require_once 'features/plugins/sub_features/class-plugins-public-post-preview.php';
      require_once 'features/plugins/sub_features/class-plugins-seo.php';
      require_once 'features/plugins/sub_features/class-plugins-yoast.php';

      // security
      require_once 'features/security/class-security.php';
      require_once 'features/security/sub_features/class-security-disable-admin-email-check.php';
      require_once 'features/security/sub_features/class-security-disable-file-edit.php';
      require_once 'features/security/sub_features/class-security-disable-unfiltered-html.php';
      require_once 'features/security/sub_features/class-security-head-cleanup.php';
      require_once 'features/security/sub_features/class-security-hide-users.php';
      require_once 'features/security/sub_features/class-security-remove-comment-moderation.php';
      require_once 'features/security/sub_features/class-security-remove-commenting.php';

      // speed
      require_once 'features/speed/class-speed.php';
      require_once 'features/speed/sub_features/class-speed-limit-revisions.php';
      require_once 'features/speed/sub_features/class-speed-move-jquery.php';
      require_once 'features/speed/sub_features/class-speed-remove-emojis.php';
      require_once 'features/speed/sub_features/class-speed-remove-metabox.php';

      // initialize features
      $features = array(
        'x_core_admin'          => new X_Core_Admin,
        'x_core_classic_editor' => new X_Core_Classic_Editor,
        'x_core_dashboard'      => new X_Core_Dashboard,
        'x_core_front_end'      => new X_Core_Front_End,
        'x_core_plugins'        => new X_Core_Plugins,
        'x_core_security'       => new X_Core_Security,
        'x_core_speed'          => new X_Core_Speed,
        'x_core_debug'          => new X_Core_Debug,
      );

    });

  }

  /**
   * Get instance
   */
  public static function get_instance() {

    if (!isset(self::$instance)) {
      self::$instance = new X_Core();
    }
    return self::$instance;

  }

}

// init
add_action('plugins_loaded', function() {

  $x_core = X_Core::get_instance();

});

// load translations
add_action('plugins_loaded', function () {

  load_plugin_textdomain('x_core-core', false, basename(dirname( __FILE__ )) . '/languages/');

});
