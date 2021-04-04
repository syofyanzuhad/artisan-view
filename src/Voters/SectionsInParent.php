<?php

namespace Syofyanzuhad\ArtisanView\Voters;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputInterface;
use Syofyanzuhad\ArtisanView\BlockStack;
use Syofyanzuhad\ArtisanView\Blocks\Section;

class SectionsInParent implements Voter
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
  return $input->hasOption('section');
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
  foreach ((array) $input->getOption('section') as $section) {
   if (Str::contains($section, ':')) {
    $section = explode(':', $section);
    $name    = $section[0];
    unset($section[0]);
    $content = join("", $section);

    $blockStack->add(new Section($name, $content));
   }
  }
 }
}
