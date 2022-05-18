<?php

namespace EstelSmith\FlyAssetBundler\Bundle;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundle\OutputFilenameStrategyInterface;

class SourceBundle implements SourceBundleInterface
{
    /**
     * @var string
     */
    private $outputDirectory;

    /**
     * @var string
     */
    private $webDirectory;

    /**
     * @var OutputFilenameStrategyInterface
     */
    private $outputFilenameStrategy;

    /**
     * @var array<string>
     */
    private $files = [];

    /**
     * @param string $outputDirectory
     * @param string $webDirectory
     * @param OutputFilenameStrategyInterface $outputFilenameStrategy
     * @param array<string> $files
     */
    public function __construct(
        string $outputDirectory,
        string $webDirectory,
        OutputFilenameStrategyInterface $outputFilenameStrategy,
        array $files
    )
    {
        $this->outputDirectory = $outputDirectory;
        $this->webDirectory = $webDirectory;
        $this->outputFilenameStrategy = $outputFilenameStrategy;
        $this->files = $files;
    }

    public function getOutputDirectory(): string
    {
        return $this->outputDirectory;
    }

    public function getWebDirectory(): string
    {
        return $this->webDirectory;
    }

    public function getOutputFilenameStrategy(): OutputFilenameStrategyInterface
    {
        return $this->outputFilenameStrategy;
    }

    /**
     * @return array<string>
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    public function getDiskPath(): string
    {
        $outputFilename = $this->getOutputFilenameStrategy()->getFilename($this);

        return sprintf(
            '%s%s%s',
            rtrim($this->getOutputDirectory(), DIRECTORY_SEPARATOR),
            DIRECTORY_SEPARATOR,
            $outputFilename
        );
    }

    public function getWebPath(): string
    {
        $outputFilename = $this->getOutputFilenameStrategy()->getFilename($this);

        return sprintf(
            '%s/%s',
            rtrim($this->getWebDirectory(), '/'),
            $outputFilename
        );
    }
}
