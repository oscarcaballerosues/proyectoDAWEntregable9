<?php

namespace model\services;

use models\services\MovieService;
use PHPUnit\Framework\TestCase;

require_once "app/model/services/MovieService.php";
require_once "app/model/dao/DaoMovie.php";
require_once "app/model/dao/DaoBackdrops.php";
require_once "app/model/entity/MovieEntity.php";
require_once "app/model/entity/Backdrops.php";
require_once "app/model/config/MySQLBD.php";

class MovieServiceTest extends TestCase
{

    public function testGetMovies()
    {
        $arr = MovieService::getMovies();
        $this->assertFalse(empty($arr));
    }
    public function testGetMovie()
    {
        $obj = MovieService::getMovie("tt10298840");
        $this->assertNotNull($obj);
    }
    public function testGetMovieNull()
    {
        $obj = MovieService::getMovie("");
        $this->assertNull($obj);
    }

}
