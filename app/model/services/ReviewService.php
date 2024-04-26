<?php
class ReviewService
{
    public static function getReviews($id): array
    {
        $daoReview = new DaoReview();
        return $daoReview->findByImbd_id($id);
    }
    public static function getReview($id): ?ReviewEntity
    {
        $daoReview = new DaoReview();
        return $daoReview->findById($id);
    }
    public static function setReview(ReviewEntity $obj)
    {
        $daoReview = new DaoReview();
        $daoReview->save($obj);
    }
    public static function updateReview(ReviewEntity $obj)
    {
        $daoReview = new DaoReview();
        $daoReview->update($obj);
    }

    public static function deleteReview($id)
    {
        $daoReview = new DaoReview();
        $daoReview->delete($id);
    }
}