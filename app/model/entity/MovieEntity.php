<?php

class MovieEntity
{
    public string $imdb_id;
    public string $title;
    public string $releaseDate;
    public string $trailerLink;
    public string $genres;
    public string $poster;
    public array $backdrops;

    /**
     * @param string $imdb_id
     * @param string $title
     * @param string $releaseDate
     * @param string $trailerLink
     * @param string $genres
     * @param string $poster
     */
    public function __construct(string $imdb_id, string $title, string $releaseDate, string $trailerLink, string $genres, string $poster, array $backdrops)
    {
        $this->imdb_id = $imdb_id;
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->trailerLink = $trailerLink;
        $this->genres = $genres;
        $this->poster = $poster;
        $this->backdrops = $backdrops;
    }

    public static function arrayToObj($row, $backdrops)
    {
        return new MovieEntity(
            $row["imdb_id"] ?? '',
            $row["title"] ?? '',
            $row["releaseDate"] ?? '',
            $row["trailerLink"] ?? '',
            $row["genres"] ?? '',
            $row["poster"] ?? '',
                $backdrops
        );
    }

    public static function jsonToObj($json)
    {
        $obj = json_decode($json);
        $imdb_id = isset($obj->imdb_id) ? $obj->imdb_id : '';
        $title = isset($obj->title) ? $obj->title : '';
        $releaseDate = isset($obj->releaseDate) ? $obj->releaseDate : '1970-01-01';
        $trailerLink = isset($obj->trailerLink) ? $obj->trailerLink : '';
        $genres = isset($obj->genres) ? $obj->genres : '';
        $poster = isset($obj->poster) ? $obj->poster : '';
        $backdrops = isset($obj->backdrops) ? $obj->backdrops : '';
        return new MovieEntity(
            $imdb_id,
            $title,
            $releaseDate,
            $trailerLink,
            $genres,
            $poster,
            $backdrops
        );
    }

    public function __toString()
    {
        return "IMDB ID: " . $this->imdb_id . "\n" .
            "Title: " . $this->title . "\n" .
            "Release Date: " . $this->releaseDate . "\n" .
            "Trailer Link: " . $this->trailerLink . "\n" .
            "Genres: " . $this->genres . "\n" .
            "Poster: " . $this->poster . "\n" .
            "Backdrops: " . implode(", ", $this->backdrops) . "\n";
    }

}