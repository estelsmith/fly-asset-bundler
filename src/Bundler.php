<?php

namespace EstelSmith\FlyAssetBundler;

use EstelSmith\FlyAssetBundler\Bundle\GeneratedBundle;
use EstelSmith\FlyAssetBundler\Bundle\SourceBundle;

class Bundler implements BundlerInterface
{
    public function bundle(SourceBundle $sourceBundle): GeneratedBundle
    {
        $outputs = [];

        foreach ($sourceBundle->getFiles() as $file) {
            $content = file_get_contents($file);
            if (!$content) continue;

            $outputs[] = $content;
        }

        $outputFilename = $sourceBundle->getOutputFilenameStrategy()->getFilename($sourceBundle);

        $diskPath = sprintf(
            '%s%s%s',
            rtrim($sourceBundle->getOutputDirectory(), DIRECTORY_SEPARATOR),
            DIRECTORY_SEPARATOR,
            $outputFilename
        );

        $webPath = sprintf(
            '%s/%s',
            rtrim($sourceBundle->getWebDirectory(), '/'),
            $outputFilename
        );

        file_put_contents(
            $diskPath,
            implode("\n", $outputs)
        );

        return new GeneratedBundle(
            $diskPath,
            $webPath,
            filemtime($diskPath)
        );
    }
}
