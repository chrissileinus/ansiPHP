<?php
/*
 * Created on Wed Nov 03 2021
 *
 * Copyright (c) 2021 Christian Backus (Chrissileinus)
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Chrissileinus\Ansi;

/**
 * Decorate Text with
 *
 * Forground: f_[color];
 *
 * Background: g_[color];
 *
 * color = black, red, green, yellow, blue, magenta, cyan, lightGray, darkGray, lightRed, lightGreen, lightYellow, lightBlue, lightMagenta, lightCyan, white;
 *
 * style = bold, dim, italic, underline, blink, inverse, hidden;
 *
 * Text::set('f_black', 'b_blue', 'bold') . "some random text" . Text::reset();
 *
 * Text::inject("some random text", 'f_black', 'b_blue', 'bold');
 */
class Text
{
  protected static $ANSI_CODES_STYLE = [
    "default"      => 0,
    "bold"         => 1,
    "dim"          => 2,
    "italic"       => 3,
    "underline"    => 4,
    "blink"        => 5,
    "inverse"      => 7,
    "hidden"       => 8,
  ];
  protected static $ANSI_CODES_FORGROUND = [
    "default"      => 39,
    "black"        => 30,
    "red"          => 31,
    "green"        => 32,
    "yellow"       => 33,
    "blue"         => 34,
    "magenta"      => 35,
    "cyan"         => 36,
    "lightGray"    => 37,
    "darkGray"     => 90,
    "lightRed"     => 91,
    "lightGreen"   => 92,
    "lightYellow"  => 93,
    "lightBlue"    => 94,
    "lightMagenta" => 95,
    "lightCyan"    => 96,
    "white"        => 97,
  ];
  protected static $ANSI_CODES_BACKGROUND = [
    "default"      => 49,
    "black"        => 40,
    "red"          => 41,
    "green"        => 42,
    "yellow"       => 43,
    "blue"         => 44,
    "magenta"      => 45,
    "cyan"         => 46,
    "lightGray"    => 47,
    "darkGray"     => 100,
    "lightRed"     => 101,
    "lightGreen"   => 102,
    "lightYellow"  => 103,
    "lightBlue"    => 104,
    "lightMagenta" => 105,
    "lightCyan"    => 106,
    "white"        => 107,
  ];

  /**
   * Set Color and Style
   *
   * Forground: f_[color]
   *
   * Background: g_[color]
   *
   * color = black, red, green, yellow, blue, magenta, cyan, lightGray, darkGray, lightRed, lightGreen, lightYellow, lightBlue, lightMagenta, lightCyan, white
   *
   * style = bold, dim, italic, underline, blink, inverse, hidden
   *
   * Text::set('f_black', 'b_blue', 'bold');
   *
   * @param string ...$args list of color and style
   * @return string with the Ansi Code
   */
  public static function set(...$args): string
  {
    $currentStyle = 0;
    $currentForground = 39;
    $currentBackground = 49;

    foreach ($args as $arg) {
      /* Set Style */
      if (
        array_key_exists($arg, self::$ANSI_CODES_STYLE)
      ) {
        $currentStyle = self::$ANSI_CODES_STYLE[$arg];
      }
      /* Set Forground */
      if (
        preg_match('/^f_(.+)$/', $arg, $match) &&
        array_key_exists($match[1], self::$ANSI_CODES_FORGROUND)
      ) {
        $currentForground = self::$ANSI_CODES_FORGROUND[$match[1]];
      }
      /* Set Background */
      if (
        preg_match('/^b_(.+)$/', $arg, $match) &&
        array_key_exists($match[1], self::$ANSI_CODES_BACKGROUND)
      ) {
        $currentBackground = self::$ANSI_CODES_BACKGROUND[$match[1]];
      }
    }
    return "\e[" . $currentStyle . ";" . $currentForground . ";" . $currentBackground . "m";
  }

  /**
   * Reset the all to default
   * @return string         reset Ansi Code
   */
  public static function reset(): string
  {
    return "\e[0m";
  }

  /**
   * inject Color and Style;
   * @param string $string  Some Text.
   * @param string ...$args list of color and style
   * @return string         Some Text with the Ansi Code around
   */
  public static function inject(string $string, ...$args)
  {
    return self::set(...$args) . $string . self::reset();
  }
}
