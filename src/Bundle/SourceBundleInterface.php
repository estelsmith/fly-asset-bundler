<?php

namespace EstelSmith\FlyAssetBundler\Bundle;

interface SourceBundleInterface
{
    public function getOutputDirectory(): string;
    public function getWebDirectory(): string;
    public function getOutputFilename(): string;

    /**
     * @return array<string>
     */
    public function getFiles(): array;
}
