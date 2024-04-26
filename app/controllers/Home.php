<?php
class Home extends Controller
{
    public function index()
    {   
        $movies = $this->model('movie')->getMovies();
        $data = array();
        $data['movies'] = $movies;
        $this->view('index', $data);
    }

}