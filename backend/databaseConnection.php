<?php 
    try
    {
        $db = new PDO(
            'mysql:host=localhost; dbname=blogmagazine;',
            'root',
            '',
        );
    }
    catch(Exception $e)
    {
        die('erreur : '.$e->getMessage());
    }
?>