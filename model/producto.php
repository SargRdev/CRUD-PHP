<?php
    class Producto extends Conectar{
        
        public function get_producto(){
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT * FROM tb_producto WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->excute();
            return $resultado = $sql->fetchAll();
        }


        public function get_producto($id){
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "SELECT * FROM tb_producto WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->excute();
            return $resultado = $sql->fetchAll();
        }

        public function delete_producto($id){
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "UPDATE tb_producto 
                SET 
                 est = 0,
                 fech_elim = now(),
                WHERE prod_id = ?
            ";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->excute();
            return $resultado = $sql->fetchAll();
        }

        public function insert_producto($nombre){
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "INSERT INTO tb_producto (prod_id,prod_nom,prod_crea,) VALUES(null,?,now(),1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->excute();
            return $resultado = $sql->fetchAll();
        }

        public function update_producto($id, $nombre){
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "UPDATE tb_producto 
                SET 
                 prod_nom = ?,
                 fech_modi = now(),
                WHERE prod_id = ?
            ";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$id);
            $sql->excute();
            return $resultado = $sql->fetchAll();
        }

    }
?>