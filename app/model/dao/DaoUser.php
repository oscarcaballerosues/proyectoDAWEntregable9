<?php

namespace model\dao;

use model\config\MySQLBD;
use model\entity\User;

class DaoUser
{
    public function findAll()
    {
        $result = MySQLBD::queryRead("SELECT * FROM user_client");
        $list = array();
        foreach ($result as $row) {
            $list[] = User::arrayToObj($row);
        }
        return $list;
    }

    public function findById($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM user_client WHERE user_id = ?", $id);
        if (count($result) < 1) {
            return null;
        }
        return User::arrayToObj($result[0]);
    }
}