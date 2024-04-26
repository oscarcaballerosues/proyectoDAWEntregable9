<?php

namespace model\dao;


use model\config\MySQLBD;
use model\entity\Playlist;

//TODO Falta hacer Querys que se comuniquen con la tabla movie_playlist para que funcione con la BD
class DaoPlaylist
{
    public function findAll()
    {
        $result = MySQLBD::queryRead("SELECT * FROM playlist");
        $list = array();
        foreach ($result as $row) {
            $list[] = Playlist::arrayToObj($row);
        }
        return $list;
    }

    public function findById($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM playlist WHERE id = ?", $id);
        if (count($result) < 1) {
            return null;
        }
        return Playlist::arrayToObj($result[0]);
    }

    public function findByName($name)
    {
        $result = MySQLBD::queryRead("SELECT * FROM playlist WHERE playlist_name = ?", $name);
        $list = array();
        foreach ($result as $row) {
            $list[] = Playlist::arrayToObj($row);
        }
        return $list;
    }

    public function save(Playlist $obj)
    {
        $query = "INSERT INTO playlist(playlist_name, user_id) VALUES (?,?)";
        MySQLBD::queryWrite(
            $query,
            $obj->playlistName,
            $obj->userId,
        );
    }

    public function update(Playlist $playlist)
    {
        $query = "UPDATE playlist SET 
            playlist_name = ?,
            user_id = ?
        WHERE id = ?";
        MySQLBD::queryWrite(
            $query,
            $playlist->playlistName,
            $playlist->userId,
        );
    }
}