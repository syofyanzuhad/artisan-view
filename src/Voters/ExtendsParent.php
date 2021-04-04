<?php

namespace Syofyanzuhad\ArtisanView\Voters;

use Symfony\Component\Console\Input\InputInterface;
use Syofyanzuhad\ArtisanView\BlockStack;
use Syofyanzuhad\ArtisanView\Blocks\Extend;

class ExtendsParent implements Voter
{
 /**
  * @var string
  */
 protected $path;

 /**
  * {@inheritdoc}
  */
 public function canHandle(InputInterface $input)
 {
  return $input->hasOption('extends') && $input->getOption('extends');
 }

 public function inPath($path)
 {
  $this->path = $path;

  return $this;
 }

 /**
  * {@inheritdoc}
  */
 public function run(InputInterface $input, BlockStack $blockStack)
 {
  $blockStack->add(new Extend($input->getOption('extends')));
 }
}
