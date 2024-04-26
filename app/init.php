<?php
require_once 'utils/Constants.php';
require_once 'config/MySQLBD.php';
spl_autoload_register(function ($name) {
    require_once 'core/' . $name . '.php';
});