<?php

namespace Chrissileinus\Ansi;

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
   * @param  mixed $command Clear::toEnd | Clear::toStart | Clear::All
   * @return string       Ansi Code
   */
  public static function screen(int $command): string
  {
    if ($command >= 0 && $command <= 2) return "\e[" . $command . "J";
    return "";
  }

  /**
   * line
   *
   * @param  mixed $command Clear::toEnd | Clear::toStart | Clear::All
   * @return string       Ansi Code
   */
  public static function line(int $command): string
  {
    if ($command >= 0 && $command <= 2) return "\e[" . $command . "K";
    return "";
  }
}
