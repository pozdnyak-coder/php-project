<?php
    function db(){
       $dbname = 'php_project_19_30';
       $dbuser = 'root';
       $dbpass = '';
       $dbhost = 'localhost';
       
       return new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    }; 