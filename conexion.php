<?php

    function connect(){
        $enlace = mysql_connect('localhost', 'iagogo', 'abc123.');
        if (!$enlace) {
            die('No pudo conectarse: ' . mysql_error());
        }
        $db = mysql_select_db("bwep") or die(mysql_error());
    }
?>
