<?php
/**
 * Setup Gutenberg
 *
 * @package axio
 */

/**
 * Gutenberg setup
 */
add_action('after_setup_theme', function() {
  // rem as custom unit
  add_theme_support( 'custom-units', array( 'rem' ) );

  // support wide width
  add_theme_support('align-wide');

  // disable custom color picker
  add_theme_support('disable-custom-colors');

  // disable font size selection
  add_theme_support('disable-custom-font-sizes');

  // disable default patterns
  remove_theme_support('core-block-patterns');

  // disable gradients
  add_theme_support('__experimental-editor-gradient-presets', []);
  add_theme_support('__experimental-disable-custom-gradients', true);
  add_theme_support('editor-gradient-presets', []);
  add_theme_support('disable-custom-gradients', true);

  // remove font size options
  add_theme_support('editor-font-sizes', []);

  /**
   * Remove colors and prefer using colors through custom styles
   * as long as Gutenberg won't support scoping specific colors
   * to specific blocks. As for now, the same color options will
   * show up to every block that supports colors and fot both
   * text color and background color options.
   */
  add_theme_support('editor-color-palette', []);

});
