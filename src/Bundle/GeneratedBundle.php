<?php

namespace EstelSmith\FlyAssetBundler\Bundle;

class GeneratedBundle implements GeneratedBundleInterface
{
    /**
     * @var string
     */
    private $diskPath;

    /**
     * @var string
     */
    private $webPath;

    /**
     * @var string
     */
    private $modifiedTime;

    public function __construct(
        string $diskPath,
        string $webPath,
        int $modifiedTime
    )
    {
        $this->diskPath = $diskPath;
        $this->webPath = $webPath;
        $this->modifiedTime = $modifiedTime;
    }

    public function getDiskPath(): string
    {
        return $this->diskPath;
    }

    public function getWebPath(): string
    {
        return $this->webPath;
    }

    public function getModifiedTime()
    {
        return $this->modifiedTime;
    }
}
