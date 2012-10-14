<?php
function dbconnect(){
        GLOBAL $con;
        $con = mysql_connect('','','');
        if(!$con){
                die("Error in connection!");
        }   
        else {
                $chooseDB = "USE roomReser";
                $fetchDB = mysql_query( $chooseDB , $con);
                if(!$fetchDB){
                        die("no database!");
                }   
        }   
}
?>
