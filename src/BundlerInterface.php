<?php

namespace EstelSmith\FlyAssetBundler;

use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundleInterface;
use EstelSmith\FlyAssetBundler\Bundle\SourceBundleInterface;

interface BundlerInterface
{
    public function bundle(SourceBundleInterface $sourceBundle): GeneratedBundleInterface;
}
