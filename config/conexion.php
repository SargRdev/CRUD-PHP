<?php

    class Conectar {

        protected $dbh;


        protected function conexion (){
            try{
                
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=crud2", "root","");

                return $conectar;

            }catch(Exception $e){

                print "¡Error de conexión a la BD: " .$e->getMessege()."<br/>";
                die();

            }
        }

        function set_Names(){
            return $this=dbh->query("SET NAMES 'UTF8´");
        }
    }

?>