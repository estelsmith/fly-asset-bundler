<?php

namespace EstelSmith\FlyAssetBundler\Bundle\SourceBundle;

use EstelSmith\FlyAssetBundler\Bundle\SourceBundleInterface;

class ModifiedTimeOutputFilenameStrategy implements OutputFilenameStrategyInterface
{
    /**
     * @var string
     */
    private $baseName;

    /**
     * @var string
     */
    private $extension;

    public function __construct(string $baseName, string $extension)
    {
        $this->baseName = $baseName;
        $this->extension = $extension;
    }

    public function getFilename(SourceBundleInterface $sourceBundle): string
    {
        $modifiedTimes = [];

        foreach ($sourceBundle->getFiles() as $file) {
            $modifiedTime = filemtime($file);
            if (!$modifiedTime) continue;

            $modifiedTimes[] = $modifiedTime;
        }

        $hash = hash(
            'sha1',
            implode('', $modifiedTimes)
        );

        return sprintf(
            '%s.%s.%s',
            $this->baseName,
            $hash,
            $this->extension
        );
    }
}
