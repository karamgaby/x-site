<?php

namespace X_UI\Core\Modules\Footer;

use X_UI\Core\AbstractTokens;
class Tokens extends AbstractTokens {
  private static $instance = null;
  private function __construct() {
    parent::__construct([
        "bgColor" => "mate-black-900",
        "titleColor" => "yellow-gold-300",
        "textColor" => "white-white-50",
    ]);
  }

  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Tokens();
    }
    return self::$instance;
  }
}
