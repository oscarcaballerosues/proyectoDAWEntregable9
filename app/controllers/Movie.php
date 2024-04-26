<?php

class Movie extends Controller
{

    public function index($id = '')
    {
        // $movie = MovieService::getMovie($id);
        // $tags = explode(',',$movie->genres);
        // $reviews = ReviewService::getReviews($id);
        // require_once('../app/views/movie.php');
    }

    public function findOne($id = '')
    {
        $movie = $this->model('movie')->getMovie($id);
        $reviews = $this->model('review')->getReviews($id);
        $data = array();
        $data['movie'] = $movie;
        $data['tags'] = explode(',',$movie->genres);
        $data['reviews'] = $reviews;
        $this->view('movie', $data);
    }

    public function save()
    {
        // $body = file_get_contents("php://input");
        // $movie = \model\entity\MovieEntity::jsonToObj($body);
        // MovieService::setMovie($movie);
    }

    public function update()
    {
        // $body = file_get_contents("php://input");
        // $movie = \model\entity\MovieEntity::jsonToObj($body);
        // MovieService::updateMovie($movie);
    }

    public function delete($id)
    {
        // MovieService::deleteMovie($id);
    }
}