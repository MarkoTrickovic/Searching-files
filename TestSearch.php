<?php declare(strict_types=1);


use PHPUnit\Framework\TestCase;
require '/wamp64/www/Searching files/SearchDirectory.php';

class TestSearch extends TestCase
{
    public function testSearchDirRecursevly() {
        $fn = "Test.php";
        $dp = "C:\\";
        $s = new SearchDirectory($dp, $fn);
        $f = $s->searchDirRecursevly();
        if (strcmp($f, $fn) !== 0) {
            $this->assertFileDoesNotExist("$dp + $fn");
        } else {
            $this->assertFileExists($fn);
        }
    }
}
