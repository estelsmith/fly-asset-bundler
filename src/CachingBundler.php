<?php

namespace EstelSmith\FlyAssetBundler;

use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundle;
use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundleInterface;
use EstelSmith\FlyAssetBundler\Bundle\SourceBundleInterface;

class CachingBundler implements BundlerInterface
{
    /**
     * @var BundlerInterface
     */
    private $wrapped;

    public function __construct(BundlerInterface $wrapped)
    {
        $this->wrapped = $wrapped;
    }

    public function bundle(SourceBundleInterface $sourceBundle): GeneratedBundleInterface
    {
        if (!file_exists($sourceBundle->getDiskPath())) {
            return $this->wrapped->bundle($sourceBundle);
        }

        $diskPath = $sourceBundle->getDiskPath();

        return new GeneratedBundle(
            $diskPath,
            $sourceBundle->getWebPath(),
            filemtime($diskPath)
        );
    }
}
