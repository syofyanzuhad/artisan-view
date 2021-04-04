<?php

namespace Syofyanzuhad\ArtisanView;

use Illuminate\Support\Str;

class Config
{
 /**
  * @var string
  */
 protected $name;

 /**
  * @var string
  */
 protected $extension;

 /**
  * @var bool
  */
 protected $resource = false;

 /**
  * @var array
  */
 protected $verbs = ['index', 'create', 'edit', 'show'];

 /**
  * @var bool
  */
 protected $force = false;

 /**
  * @var string
  */
 protected $path;

 /**
  * @param string $name
  *
  * @return \Syofyanzuhad\ArtisanView\Config
  */
 public function setName($name)
 {
  $this->name = $name;

  return $this;
 }

 /**
  * @return string
  */
 public function getName()
 {
  return $this->name;
 }

 /**
  * @param string $extension
  *
  * @return \Syofyanzuhad\ArtisanView\Config
  */
 public function setExtension($extension)
 {
  if (!Str::startsWith($extension, '.')) {
   $extension = ".$extension";
  }

  $this->extension = $extension;

  return $this;
 }

 /**
  * @return string
  */
 public function getExtension()
 {
  return $this->extension;
 }

 /**
  * @param bool $resource
  *
  * @return \Syofyanzuhad\ArtisanView\Config
  */
 public function setResource($resource)
 {
  $this->resource = $resource;

  return $this;
 }

 /**
  * @return bool
  */
 public function isResource()
 {
  return $this->resource;
 }

 /**
  * @param mixed ...$verbs
  *
  * @return \Syofyanzuhad\ArtisanView\Config
  */
 public function setVerbs(...$verbs)
 {
  $this->verbs = $verbs;

  return $this;
 }

 /**
  * @return array
  */
 public function getVerbs()
 {
  return $this->verbs;
 }

 /**
  * @return bool
  */
 public function isForce()
 {
  return $this->force;
 }

 /**
  * @param bool $force
  *
  * @return \Syofyanzuhad\ArtisanView\Config
  */
 public function setForce(bool $force)
 {
  $this->force = $force;

  return $this;
 }

 public function getPath()
 {
  return $this->path;
 }

 public function setPath($path)
 {
  $this->path = $path;

  return $this;
 }
}
