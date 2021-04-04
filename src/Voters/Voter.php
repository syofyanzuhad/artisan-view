<?php

namespace Syofyanzuhad\ArtisanView\Voters;

use Symfony\Component\Console\Input\InputInterface;
use Syofyanzuhad\ArtisanView\BlockStack;

interface Voter
{
 /**
  * @param \Symfony\Component\Console\Input\InputInterface $input
  *
  * @return bool
  */
 public function canHandle(InputInterface $input);

 /**
  * @param string $path
  *
  * @return \Syofyanzuhad\ArtisanView\Voters\Voter
  */
 public function inPath($path);

 /**
  * @param \Symfony\Component\Console\Input\InputInterface $input
  * @param \Syofyanzuhad\ArtisanView\BlockStack $blockStack
  *
  * @return void
  */
 public function run(InputInterface $input, BlockStack $blockStack);
}
