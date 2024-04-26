<?php

namespace model\entity;

class PlaybackHistory
{
    public int $playback_id;
    public int $user_id;
    public string $imdb_id;
    public \DateTime $date_timestamp;

    /**
     * @param int $playback_id
     * @param int $user_id
     * @param string $imdb_id
     * @param \DateTime $date_timestamp
     */
    public function __construct(int $playback_id, int $user_id, string $imdb_id, \DateTime $date_timestamp)
    {
        $this->playback_id = $playback_id;
        $this->user_id = $user_id;
        $this->imdb_id = $imdb_id;
        $this->date_timestamp = $date_timestamp;
    }

    public static function arrayToObj($row)
    {
        return new PlaybackHistory(
            $row['playback_id'] ?? 0,
            $row['user_id'] ?? 0,
            $row['imdb_id'] ?? '',
            $row['date_timestamp'] ?? new \DateTime('now')
        );
    }
}