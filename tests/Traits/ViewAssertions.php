<?php

namespace Syofyanzuhad\ArtisanView\Tests\Traits;

trait ViewAssertions
{
 /**
  * @param string $name
  */
 public static function assertViewExists($name)
 {
  self::assertFileExists(base_path('resources/views/' . $name));
 }

 /**
  * @param string $name
  */
 public static function assertViewNotExists($name)
 {
  self::assertFileNotExists(base_path('resources/views/' . $name));
 }
}
