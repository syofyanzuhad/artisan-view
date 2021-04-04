<?php

namespace Syofyanzuhad\ArtisanView\Voters;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputInterface;
use Syofyanzuhad\ArtisanView\BlockStack;
use Syofyanzuhad\ArtisanView\Blocks\InlineSection;

class InlineSectionsInParent implements Voter
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
  return $input->hasOption('inline-section');
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
  foreach ((array) $input->getOption('inline-section') as $section) {
   if (Str::contains($section, ':')) {
    list($name, $title) = explode(':', $section);

    $blockStack->add(new InlineSection($name, $title));
   }
  }
 }
}
