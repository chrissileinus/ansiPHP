<?php
/*
 * Created on Wed Nov 03 2021
 *
 * Copyright (c) 2021 Christian Backus (Chrissileinus)
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Chrissileinus\Ansi;

class Cursor
{
  /**
   * up
   *
   * @param  mixed $steps
   * @return string
   */
  public static function up(int $steps): string
  {
    return "\e[" . $steps . "A";
  }

  /**
   * down
   *
   * @param  mixed $steps
   * @return string
   */
  public static function down(int $steps): string
  {
    return "\e[" . $steps . "B";
  }

  /**
   * right
   *
   * @param  mixed $steps
   * @return string
   */
  public static function right(int $steps): string
  {
    return "\e[" . $steps . "C";
  }

  /**
   * left
   *
   * @param  mixed $steps
   * @return string
   */
  public static function left(int $steps): string
  {
    return "\e[" . $steps . "D";
  }

  /**
   * prevLine
   *
   * @param  mixed $steps
   * @return string
   */
  public static function prevLine(int $steps): string
  {
    return "\e[" . $steps . "F";
  }

  /**
   * nextLine
   *
   * @param  mixed $steps
   * @return string
   */
  public static function nextLine(int $steps): string
  {
    return "\e[" . $steps . "E";
  }

  /**
   * newLine
   *
   * @return string
   */
  public static function newLine(): string
  {
    return "\n";
  }
}
