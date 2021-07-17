<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require '/wamp64/www/Searching files/SearchDirectory.php';

class TestSearch extends TestCase
{
    public function testSearchDirIteratively() : void {
        $fn = "Test.php";
        $dp = "C:\\wamp64\\www";
        $s = new SearchDirectory($dp, $fn);
        $f = $s->searchDirIteratively();

        if (strcmp($fn, $f)) {
            $this->assertSame($fn, $f);
        }

        if (strlen($f) == 0) {
            $this->assertFileDoesNotExist($fn, $f);
        } else {
            $this->assertFileExists($f);
        }
    }

    public function testSearchDirectoryIteratively() : void {
        $fr = searchDirectoryIteratively("C:\\wamp64\\www", "Test.php");
        if (strlen($fr) === 0) { // File is not found
            $this->assertFileDoesNotExist("Test.php", $fr);
        } else {
            $this->assertPrint($fr);
        }
    }

    public function testDirName() : void {
        $fn = "Test.php";
        $dp = "C:\\wamp64\\www";
        $s = new SearchDirectory($dp, $fn);
        $d = $s->getDirName();

        if (strlen($d) > 0) {
            $this->assertSame($dp, $d);
        } else {
            $this->assertEmpty($dp);
        }
    }

    public function testFileName() : void {
        $fn = "Test.php";
        $dp = "C:\\wamp64\\www";
        $s = new SearchDirectory($dp, $fn);
        $f = $s->getFileName();

        if (strlen($f) > 0) {
            $this->assertSame($fn, $f);
        } else {
            $this->assertEmpty($fn);
        }
    }
}