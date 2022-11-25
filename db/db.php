<?php

    // $db['host'] =  'localhost';
    // $db['username'] = 'admin';
    // $db['password'] = '1234';
    // $db['name'] = 'cms';

    $host = 'localhost';
    $username = 'admin';
    $password = 'admin';
    $name = 'cms';

        // foreach($db as $key => $value){
        //     define($key, $value);
        // }

    $connect = new mysqli($host, $username, $password, $name);
?>