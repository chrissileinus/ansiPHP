<?php

namespace Ansi;

/**
 * Clear
 *
 * Clear::toEnd
 * Clear::toStart
 * Clear::All
 */
class Clear
{
  const toEnd = 0;
  const toStart = 1;
  const All = 2;

  /**
   * screen
   *
   * @param  mixed $value Clear::toEnd | Clear::toStart | Clear::All
   * @return string       Ansi Code
   */
  public static function screen(int $value): string
  {
    if ($value >= 0 && $value <= 2) return "\e[" . $value . "J";
    return "";
  }

  /**
   * line
   *
   * @param  mixed $value Clear::toEnd | Clear::toStart | Clear::All
   * @return string       Ansi Code
   */
  public static function line(int $value): string
  {
    if ($value >= 0 && $value <= 2) return "\e[" . $value . "K";
    return "";
  }
}
