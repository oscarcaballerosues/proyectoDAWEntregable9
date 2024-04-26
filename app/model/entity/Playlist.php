<?php

namespace model\entity;

class Playlist
{
    public int $id;
    public string $playlistName;
    public string $userId;
    public array $movies;

    /**
     * @param int $id
     * @param string $playlistName
     * @param string $userId
     * @param array $movies
     */
    public function __construct(int $id, string $playlistName, string $userId, array $movies)
    {
        $this->id = $id;
        $this->playlistName = $playlistName;
        $this->userId = $userId;
        $this->movies = $movies;
    }


    public static function arrayToObj($row)
    {
        return new Playlist(
            $row["id"] ?? 0,
            $row["playlist_name"] ?? '',
            $row["user_id"] ?? '',
            $row["movie_playlist"] ?? array()
        );
    }

}