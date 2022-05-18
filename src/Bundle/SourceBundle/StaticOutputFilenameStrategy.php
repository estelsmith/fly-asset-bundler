<?php

namespace EstelSmith\FlyAssetBundler\Bundle\SourceBundle;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundleInterface;

class StaticOutputFilenameStrategy implements OutputFilenameStrategyInterface
{
    /**
     * @var string
     */
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function getFilename(SourceBundleInterface $sourceBundle): string
    {
        return $this->filename;
    }
}
