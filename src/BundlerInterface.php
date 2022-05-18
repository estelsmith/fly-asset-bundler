<?php

namespace EstelSmith\FlyAssetBundler;

use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundle;
use EstelSmith\FlyAssetBundler\Bundle\SourceBundle;

interface BundlerInterface
{
    public function bundle(SourceBundle $sourceBundle): GeneratedBundle;
}
