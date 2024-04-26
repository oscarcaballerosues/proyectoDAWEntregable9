<?php
class MovieService
{
    public static function getMovies(): array
    {
        $daoMovie = new DaoMovie();
       return $daoMovie->findAll();
    }
    public static function getMovie($id): MovieEntity
    {
        $daoMovie = new DaoMovie();
        return $daoMovie->findById($id);
    }
    public static function setMovie(Movie $movie)
    {
        $daoMovie = new DaoMovie();
        $daoMovie->save($movie);
    }
    public static function updateMovie(Movie $movie)
    {
        $daoMovie = new DaoMovie();
        $daoMovie->update($movie);
    }

    public static function deleteMovie($id)
    {
        $daoMovie = new DaoMovie();
        $daoMovie->delete($id);
    }
}