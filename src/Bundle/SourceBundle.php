<?php

namespace EstelSmith\FlyAssetBundler\Bundle;

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
     * @var string
     */
    private $outputFilename;

    /**
     * @var array<string>
     */
    private $files = [];

    /**
     * @param string $outputDirectory
     * @param string $webDirectory
     * @param string $outputFilename
     * @param array<string> $files
     */
    public function __construct(
        string $outputDirectory,
        string $webDirectory,
        string $outputFilename,
        array $files
    )
    {
        $this->outputDirectory = $outputDirectory;
        $this->webDirectory = $webDirectory;
        $this->outputFilename = $outputFilename;
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

    public function getOutputFilename(): string
    {
        return $this->outputFilename;
    }

    /**
     * @return array<string>
     */
    public function getFiles(): array
    {
        return $this->files;
    }
}
