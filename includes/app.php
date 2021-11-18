<?php

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__.'/../vendor/autoload.php';

    //Conectandp la db
    $db = conectBD();

    use Model\ActiveRecord;
    
    ActiveRecord::setDB($db);

    

    