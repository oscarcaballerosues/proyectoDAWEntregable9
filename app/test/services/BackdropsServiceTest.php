<?php

namespace model\services;

use PHPUnit\Framework\TestCase;
require_once "app/model/services/BackdropsService.php";
require_once "app/model/dao/DaoBackdrops.php";
require_once "app/model/entity/Backdrops.php";
require_once "app/model/config/MySQLBD.php";
class BackdropsServiceTest extends TestCase
{

    public function testGetMovies()
    {
        $arr = BackdropsService::getBackdrops();
        $this->assertFalse(empty($arr));
    }
}
