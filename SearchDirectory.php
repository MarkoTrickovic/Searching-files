<?php declare(strict_types=1);


class SearchDirectory
{
    private string $dir;
    private string $fileName;

    public function __construct(string $DirName, string $FileName) {
        $this->dir = $DirName;
        $this->fileName = $FileName;
    }

    public function getDirName() : string {
        return $this->dir;
    }

    public function getFileName() : string {
        return $this->fileName;
    }

    public function searchDirIteratively() : string {
        $ret = "";
        if ($handle = opendir($this->dir)) {    // Open dir
            while (($entry = readdir($handle)) !== false) { // Get one entry
                if (is_dir($entry) === true) {
                    // 1. Do scanning inside this directory
                    // 2. Compare each file with the file that we're looking
                    $ndirpath = $this->dir . "\\" . $entry;
                    if ($h2 = opendir($ndirpath)) {
                        while (($nentry = readdir($h2)) !== false) {
                            if (is_file($nentry) === true) {
                                if (strcmp($this->fileName, $nentry) === 0) {
                                    $ret = $ndirpath . "\\" . $nentry;
                                    break;
                                }
                            }
                        }
                        closedir($h2);
                    }
                    // 3. Break the loop and return directory
                } else {
                    // 1. Compare if it is correct file
                    // 2. If true, break the loop
                    if (strcmp($entry, $this->fileName) === 0) {
                        $ret = $this->dir . "\\" . $entry;
                        break;
                    }
                    // 3. Else, if not, continue
                }
                if (strlen($ret) > 0) {
                    break;
                }
            }
            closedir($handle);
        }
        return $ret;
    }

    /*
     * Another, possible solution, when using iterative file listing
     * is to use the scandir() method, to aquire array with the entr-
     * ies from the path supplied. Afterwards, searching into the array
     * can be done easily (or something else can be done with entries).
     */
    /**
     * @param $path - Destination where to look for the file.
     * @param $filename - Filename which we are looking to find.
     * @return string - Full destination to the location where file is found. Empty if not found.
     */
    public static function searchDirectoryIteratively($path, $filename) : string {
        $ret = "";
        $entries = scandir($path);

        return $ret;
    }

}