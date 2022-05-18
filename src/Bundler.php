<?php

namespace EstelSmith\FlyAssetBundler;

use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundle;
use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundleInterface;
use EstelSmith\FlyAssetBundler\Bundle\SourceBundleInterface;

class Bundler implements BundlerInterface
{
    public function bundle(SourceBundleInterface $sourceBundle): GeneratedBundleInterface
    {
        $outputs = [];

        foreach ($sourceBundle->getFiles() as $file) {
            $content = file_get_contents($file);
            if (!$content) continue;

            $outputs[] = $content;
        }

        $diskPath = $sourceBundle->getDiskPath();
        file_put_contents(
            $diskPath,
            implode("\n", $outputs)
        );

        return new GeneratedBundle(
            $diskPath,
            $sourceBundle->getWebPath(),
            filemtime($diskPath)
        );
    }
}
