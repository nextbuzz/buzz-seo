<?php

/**
 * Cleanup vendor dir after updating composer
 */
$dir = dirname(__FILE__) . '/vendor/';
$removeFolders = array(
    'tests',
    'tools',
    'docs',
    'doc'
);

function deleteFolder($folder) {
    $glob = glob($folder);
    foreach ($glob as $g) {
        if (!is_dir($g)) {
            unlink($g);
        } else {
            deleteFolder("$g/*");
            rmdir($g);
        }
    }
};

function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags);
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

foreach($removeFolders as $folder) {
    $removableDirs = rglob($dir . '*/' . $folder, GLOB_ONLYDIR);
    foreach($removableDirs as $toRemove) {
        deleteFolder($toRemove);
    }
}

