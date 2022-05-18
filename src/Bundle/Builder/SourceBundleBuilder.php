<?php

namespace EstelSmith\FlyAssetBundler\Bundle\Builder;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundle;

class SourceBundleBuilder
{
    /**
     * @var string
     */
    private $outputDirectory = '';

    /**
     * @var string
     */
    private $webDirectory = '';

    /**
     * @var string
     */
    private $outputFilename = '';

    /**
     * @var array<string>
     */
    private $files = [];

    public static function create(): SourceBundleBuilder
    {
        return new static();
    }

    public function build(): SourceBundle
    {
        return new SourceBundle(
            $this->outputDirectory,
            $this->webDirectory,
            $this->outputFilename,
            $this->files
        );
    }

    public function withOutputDirectory(string $outputDirectory): SourceBundleBuilder
    {
        $instance = clone $this;
        $instance->outputDirectory = $outputDirectory;
        return $instance;
    }

    public function getOutputDirectory(): string
    {
        return $this->outputDirectory;
    }

    public function withWebDirectory(string $webDirectory): SourceBundleBuilder
    {
        $instance = clone $this;
        $instance->webDirectory = $webDirectory;
        return $instance;
    }

    public function getWebDirectory(): string
    {
        return $this->webDirectory;
    }

    public function withOutputFilename(string $outputFilename): SourceBundleBuilder
    {
        $instance = clone $this;
        $instance->outputFilename = $outputFilename;
        return $instance;
    }

    public function getOutputFilename(): string
    {
        return $this->outputFilename;
    }

    /**
     * @param array<string> $files
     * @return SourceBundleBuilder
     */
    public function withFiles(array $files): SourceBundleBuilder
    {
        $instance = clone $this;
        $instance->files = $files;
        return $instance;
    }

    /**
     * @return array<string>
     */
    public function getFiles(): array
    {
        return $this->files;
    }
}
