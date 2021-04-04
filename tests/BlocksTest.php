<?php

namespace Syofyanzuhad\ArtisanView\Tests;

use Syofyanzuhad\ArtisanView\Blocks\Extend;
use Syofyanzuhad\ArtisanView\Blocks\InlineSection;
use Syofyanzuhad\ArtisanView\Blocks\Push;
use Syofyanzuhad\ArtisanView\Blocks\Section;

class BlocksTest extends TestCase
{
 /** @test */
 public function it_renders_an_extends_block()
 {
  $block = new Extend('layouts.app');

  $this->assertEquals(
   "@extends('layouts.app')" . PHP_EOL . PHP_EOL,
   $block->render()
  );
 }

 /** @test */
 public function it_renders_a_section_block()
 {
  $block = new Section('content', '<section></section>');

  $this->assertEquals(
   "@section('content')" . PHP_EOL . '<section></section>' . PHP_EOL . '@endsection' . PHP_EOL . PHP_EOL,
   $block->render()
  );
 }

 /** @test */
 public function it_renders_an_inline_section()
 {
  $block = new InlineSection('title', 'Some title');

  $this->assertEquals(
   "@section('title', 'Some title')" . PHP_EOL . PHP_EOL,
   $block->render()
  );
 }

 /** @test */
 public function it_renders_a_push_block()
 {
  $block = new Push('after-scripts');

  $this->assertEquals(
   "@push('after-scripts')" . PHP_EOL . PHP_EOL . '@endpush' . PHP_EOL . PHP_EOL,
   $block->render()
  );
 }
}
