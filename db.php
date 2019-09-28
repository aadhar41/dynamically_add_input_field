<?php

    try {
        $con = new PDO("mysql:host=localhost;dbname=pwv","root","");
    } catch (\Throwable $th) {
        //throw $th;
        echo $th->getMessage();
    }

?>