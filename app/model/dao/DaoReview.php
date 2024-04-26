<?php

class DaoReview
{
    public function findAll()
    {
        $result = MySQLBD::queryRead("SELECT * FROM review");
        $list = array();
        foreach ($result as $row) {
            $list[] = ReviewEntity::arrayToObj($row);
        }
        return $list;
    }

    public function findById($id)
    {
        $result = MySQLBD::queryRead("SELECT * FROM review WHERE reviewid = ?", $id);
        if (count($result) < 1) {
            return null;
        }
        return ReviewEntity::arrayToObj($result[0]);
    }

    public function findByImbd_id($id)
    {
        $result = MySQLBD::queryRead("SELECT 
    reviewid, imdb_id, r.user_id, rating, body, date_timestamp, username 
FROM review as r join user_client as u on r.user_id = u.user_id where r.imdb_id = ?;", $id);
        $list = array();
        foreach ($result as $row) {
            $list[] = ReviewEntity::arrayToObj($row);
        }
        return $list;
    }

    public function save(ReviewEntity $review)
    {
        $query = "INSERT INTO review VALUES (?,?,?,?,?)";
        MySQLBD::queryWrite(
            $query,
            $review->imdb_id,
            $review->user_id,
            $review->rating,
            $review->body,
            $review->date_timestamp,
        );
    }

    public function update(ReviewEntity $review)
    {
        $query = "UPDATE review SET 
            imdb_id = ?,
            user_id = ?,
            rating = ?,
            body = ?,
            date_timestamp = ?
        WHERE reviewid = ?";
        MySQLBD::queryWrite(
            $query,
            $review->imdb_id,
            $review->user_id,
            $review->rating,
            $review->body,
            $review->date_timestamp,
            $review->reviewid,
        );
    }

    public function delete($id)
    {
        $query = "DELETE from review WHERE reviewid = ?";
        MySQLBD::queryWrite(
            $query,
            $id
        );
    }
}