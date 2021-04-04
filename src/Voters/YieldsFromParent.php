<?php

namespace Syofyanzuhad\ArtisanView\Voters;

use Symfony\Component\Console\Input\InputInterface;
use Syofyanzuhad\ArtisanView\BlockStack;
use Syofyanzuhad\ArtisanView\Blocks\Section;
use Syofyanzuhad\ArtisanView\PathHelper;

class YieldsFromParent implements Voter
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
  return $input->hasOption('extends') && $input->getOption('extends')
  && $input->hasOption('with-yields') && $input->getOption('with-yields');
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
  preg_match_all(
   '~(?<!\@)\@yield\((\'|\")(.+)\1\)~',
   $this->file($input->getOption('extends')),
   $matches
  );

  foreach ($matches[2] as $section) {
   $blockStack->add(new Section($section));
  }
 }

 /**
  * Get the contents of one of the view with the given name.
  *
  * @param string $name
  *
  * @return string
  */
 protected function file($name)
 {
  $path = PathHelper::normalizePath(
   $this->path . DIRECTORY_SEPARATOR . str_replace('.', '/', $name) . '.blade.php'
  );

  return file_exists($path) ? file_get_contents($path) : '';
 }
}
