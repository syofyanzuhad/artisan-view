<?php

namespace Sven\ArtisanView\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Sven\ArtisanView\ServiceProvider;

abstract class TestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return ServiceProvider::class;
    }

    /**
     * Tear down the testing environment.
     */
    public function tearDown(): void
    {
        /** @var \Illuminate\View\FileViewFinder $viewFinder */
        $viewFinder = app('view.finder');

        foreach ($viewFinder->getPaths() as $path) {
            $this->clearDirectory($path);
        }

        parent::tearDown();
    }

    private function clearDirectory(string $path): void
    {
        if (!is_dir($path)) {
            return;
        }

        foreach ((array) scandir($path, SCANDIR_SORT_NONE) as $object) {
            if (in_array($object, ['..', '.', '.gitkeep'], false)) {
                continue;
            }

            if (is_dir($path.DIRECTORY_SEPARATOR.$object)) {
                $this->clearDirectory($path.DIRECTORY_SEPARATOR.$object);
                rmdir($path.DIRECTORY_SEPARATOR.$object);
            } else {
                unlink($path.DIRECTORY_SEPARATOR.$object);
            }
        }
    }
}
