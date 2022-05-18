<?php

namespace EstelSmith\FlyAssetBundler\Bundle;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundle\OutputFilenameStrategyInterface;

interface SourceBundleInterface
{
    public function getOutputDirectory(): string;
    public function getWebDirectory(): string;
    public function getOutputFilenameStrategy(): OutputFilenameStrategyInterface;

    /**
     * @return array<string>
     */
    public function getFiles(): array;
}
