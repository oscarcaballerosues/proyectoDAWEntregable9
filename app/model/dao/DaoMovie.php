<?php

require_once '../app/model/entity/Backdrops.php';
require_once '../app/model/services/BackdropsService.php';
require_once '../app/model/dao/DaoBackdrops.php';
class DaoMovie
{
    public function findAll()
    {
        $resultMovies = MySQLBD::queryRead("SELECT * FROM movie");
        $daoBackdrops = new DaoBackdrops();
        $list = array();
        foreach ($resultMovies as $row) {
            $backdrops = $daoBackdrops->findByImdbId($row["imdb_id"]);
            $list[] = MovieEntity::arrayToObj($row, $backdrops);
        }
        return $list;
    }

    public function findById($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM movie WHERE imdb_id = ?", $id);
        if (count($result) < 1) {
            return null;
        }
        $daoBackdrops = new DaoBackdrops();
        $backdrops = $daoBackdrops->findByImdbId($result[0]["imdb_id"]);
        return MovieEntity::arrayToObj($result[0], $backdrops);
    }

    public function save(MovieEntity $movie)
    {
        $query = "INSERT INTO movie VALUES (?,?,?,?,?,?)";
        MySQLBD::queryWrite(
            $query,
            $movie->imdb_id,
            $movie->title,
            $movie->releaseDate,
            $movie->trailerLink,
            $movie->genres,
            $movie->poster,
        );
    }

    public function update(MovieEntity $movie)
    {
        $query = "UPDATE movie SET 
            title = ?,
            releaseDate = ?,
            trailerLink = ?,
            genres = ?,
            poster = ?
        WHERE imdb_id = ?";
        MySQLBD::queryWrite(
            $query,
            $movie->title,
            $movie->releaseDate,
            $movie->trailerLink,
            $movie->genres,
            $movie->poster,
            $movie->imdb_id,
        );
    }

    public function delete(string $id)
    {
        $query = "DELETE from movie WHERE imdb_id = ?";
        MySQLBD::queryWrite(
            $query,
            $id
        );
    }
}