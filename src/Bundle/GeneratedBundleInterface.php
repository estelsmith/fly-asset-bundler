<?php

namespace EstelSmith\FlyAssetBundler\Bundle;

interface GeneratedBundleInterface
{
    public function getDiskPath(): string;
    public function getWebPath(): string;
    public function getModifiedTime();
}
