<?php

namespace model\dao;

use model\config\MySQLBD;
use model\entity\PlaybackHistory;

class DaoPlaybackHistory
{
    public function findAll()
    {
        $result = MySQLBD::queryRead("SELECT * FROM playback_history");
        $list = array();
        foreach ($result as $row) {
            $list[] = PlaybackHistory::arrayToObj($row);
        }
        return $list;
    }

    public function findById($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM playback_history WHERE playback_id = ?", $id);
        if (count($result) < 1) {
            return null;
        }
        return PlaybackHistory::arrayToObj($result[0]);
    }

    public function findByUserId($id): array
    {
        $result = MySQLBD::queryRead("SELECT * FROM playback_history WHERE user_id = ?", $id);
        $list = array();
        foreach ($result as $row) {
            $list[] = PlaybackHistory::arrayToObj($row);
        }
        return $list;
    }
    public function save(PlaybackHistory $obj)
    {
        $query = "INSERT INTO playback_history VALUES (?,?,?,?,?,?)";
        MySQLBD::queryWrite(
            $query,
            $obj->playback_id,
            $obj->user_id,
            $obj->imdb_id,
            $obj->date_timestamp,
        );
    }

    public function update(PlaybackHistory $obj)
    {
        $query = "UPDATE playback_history SET 
            user_id = ?,
            imdb_id = ?,
            date_timestamp = ?     
        WHERE playback_id = ?";
        MySQLBD::queryWrite(
            $query,
            $obj->user_id,
            $obj->imdb_id,
            $obj->date_timestamp,
            $obj->playback_id,
        );
    }
}