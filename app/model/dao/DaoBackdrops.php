<?php


class DaoBackdrops
{
    public function findAll()
    {
        $result = MySQLBD::queryRead("SELECT * FROM backdrops");
        $list = array();
        foreach ($result as $row) {
            $list[] = Backdrops::arrayToObj($row);
        }
        return $list;
    }

    public function findById($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM backdrops WHERE id = ?", $id);
        if (count($result) < 1) {
            return null;
        }
        return Backdrops::arrayToObj($result[0]);
    }

    public function findByImdbId($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM backdrops WHERE imdb_id = ?", $id);
        $list = array();
        foreach ($result as $row) {
            $list[] = Backdrops::arrayToObj($row);
        }
        return $list;
    }

    public function save(Backdrops $backdrops)
    {
        $query = "INSERT INTO backdrops VALUES (?,?)";
        MySQLBD::queryWrite(
            $query,
            $backdrops->link,
            $backdrops->imdb_id,
        );
    }

    public function update(Backdrops $backdrops)
    {
        $query = "UPDATE backdrops SET 
            link = ?,
            imdb_id = ?
        WHERE id = ?";
        MySQLBD::queryWrite(
            $query,
            $backdrops->link,
            $backdrops->imdb_id,
        );
    }
}