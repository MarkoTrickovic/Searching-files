<?php declare(strict_types=1);


class SearchDirectory
{
    private $dir;
    private $fileName;

    public function __construct($DirName, $FileName) {
        $dir = $DirName;
        $fileName = $FileName;
    }

    public function searchDirRecursevly() {
        $ret = "";
        return $ret;
    }
}