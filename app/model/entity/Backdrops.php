<?php

class Backdrops
{
    public int $id;
    public string $link;
    public string $imdb_id;

    /**
     * @param int $id
     * @param string $link
     * @param string $imdb_id
     */
    public function __construct(int $id, string $link, string $imdb_id)
    {
        $this->id = $id;
        $this->link = $link;
        $this->imdb_id = $imdb_id;
    }

    public static function arrayToObj($row)
    {
        return new Backdrops(
            $row['id'] ?? 0,
            $row['link'] ?? '',
            $row['imdb_id'] ?? ''
        );
    }

}