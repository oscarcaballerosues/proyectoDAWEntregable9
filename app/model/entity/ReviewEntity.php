<?php

class ReviewEntity
{
    public int $reviewid;
    public string $imdb_id;
    public int $user_id;
    public float $rating;
    public string $body;
    public string $date_timestamp;
    public string $username;

    /**
     * @param int $reviewid
     * @param string $imdb_id
     * @param int $user_id
     * @param float $rating
     * @param string $body
     * @param string $date_timestamp
     */
    public function __construct(int $reviewid, string $imdb_id, int $user_id, float $rating, string $body, string $date_timestamp, string $username)
    {
        $this->reviewid = $reviewid;
        $this->imdb_id = $imdb_id;
        $this->user_id = $user_id;
        $this->rating = $rating;
        $this->body = $body;
        $this->date_timestamp = $date_timestamp;
        $this->username = $username;
    }

    public static function arrayToObj($row)
    {
        return new ReviewEntity(
            $row["reviewid"] ?? 0,
            $row["imdb_id"] ?? '',
            $row["user_id"] ?? '',
            $row["rating"] ?? 0.0,
            $row["body"] ?? '',
            $row["date_timestamp"] ?? new DateTime('now'),
            $row["username"] ?? '',
        );
    }
}