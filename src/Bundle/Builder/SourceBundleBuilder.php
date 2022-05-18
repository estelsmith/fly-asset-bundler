<?php

namespace EstelSmith\FlyAssetBundler\Bundle\Builder;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundle;
use EstelSmith\FlyAssetBundler\Bundle\SourceBundle\OutputFilenameStrategyInterface;

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
     * @var OutputFilenameStrategyInterface
     */
    private $outputFilenameStrategy = '';

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
            $this->outputFilenameStrategy,
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

    public function withOutputFilenameStrategy(
        OutputFilenameStrategyInterface $outputFilenameStrategy
    ): SourceBundleBuilder
    {
        $instance = clone $this;
        $instance->outputFilenameStrategy = clone $outputFilenameStrategy;
        return $instance;
    }

    public function getOutputFilenameStrategy(): OutputFilenameStrategyInterface
    {
        return $this->outputFilenameStrategy;
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
