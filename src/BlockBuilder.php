<?php

namespace Syofyanzuhad\ArtisanView;

use Syofyanzuhad\ArtisanView\Blocks\Block;

class BlockBuilder
{
 /**
  * @param \Syofyanzuhad\ArtisanView\Blocks\Block[] $blocks
  *
  * @return string
  */
 public static function build($blocks)
 {
  return array_reduce($blocks, function ($carry, Block $block) {
   return $carry . $block->render();
  }, '');
 }
}
