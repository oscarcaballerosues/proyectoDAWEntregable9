<?php
class Controller
{
    public function model($model)
    {
        $model = ucfirst($model);
        require_once '../app/model/entity/' . $model . 'Entity.php';
        require_once '../app/model/dao/Dao' . $model . '.php';
        require_once '../app/model/services/' . $model . 'Service.php';
        $model = $model.'Service';
        return new $model();
    }

    public function view($view, $data = [])
    {
        $url = '../app/views/'.$view.'.php';
        if(file_exists($url)){
            extract($data);
            require_once $url;
        }else{
            die('The view do not exist');
        }
    }
}