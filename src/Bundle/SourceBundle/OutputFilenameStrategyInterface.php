<?php

namespace EstelSmith\FlyAssetBundler\Bundle\SourceBundle;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundleInterface;

interface OutputFilenameStrategyInterface
{
    public function getFilename(SourceBundleInterface $sourceBundle): string;
}
