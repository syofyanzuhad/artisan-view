<?php

namespace Syofyanzuhad\ArtisanView;

use Symfony\Component\Console\Input\InputInterface;
use Syofyanzuhad\ArtisanView\Blocks\Block;
use Syofyanzuhad\ArtisanView\Voters\ExtendsParent;
use Syofyanzuhad\ArtisanView\Voters\InlineSectionsInParent;
use Syofyanzuhad\ArtisanView\Voters\SectionsInParent;
use Syofyanzuhad\ArtisanView\Voters\StacksFromParent;
use Syofyanzuhad\ArtisanView\Voters\YieldsFromParent;

class BlockStack
{
    /**
     * @var \Syofyanzuhad\ArtisanView\Blocks\Block[]
     */
    protected $blocks = [];

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param string $path
     *
     * @return \Syofyanzuhad\ArtisanView\BlockStack
     */
    public function build(InputInterface $input, $path)
    {
        $voters = [
            new ExtendsParent,
            new YieldsFromParent,
            new StacksFromParent,
            new InlineSectionsInParent,
            new SectionsInParent,
        ];

        /** @var \Syofyanzuhad\ArtisanView\Voters\Voter $voter */
        foreach ($voters as $voter) {
            if (!$voter->canHandle($input)) {
                continue;
            }

            $voter->inPath($path)->run($input, $this);
        }

        return $this;
    }

    /**
     * @param \Syofyanzuhad\ArtisanView\Blocks\Block[] ...$blocks
     *
     * @return \Syofyanzuhad\ArtisanView\BlockStack
     */
    public function add(Block...$blocks)
    {
        foreach ($blocks as $block) {
            $this->blocks[] = $block;
        }

        return $this;
    }

    /**
     * @return \Syofyanzuhad\ArtisanView\Blocks\Block[]
     */
    public function all()
    {
        return $this->blocks;
    }
}
