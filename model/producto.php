<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tb_producto WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_producto_x_id($prod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tb_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_producto($prod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tb_producto
                SET
                    est=0,
                    fecha_elim=now()
                WHERE
                    prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_producto($prod_nom, $prod_desc){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tb_producto (prod_id, prod_nombre, prod_desc, fecha_crea, fecha_modi, fecha_elim, est) VALUES (NULL, ?, ?, now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_desc);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_producto($prod_id, $prod_nom, $prod_desc){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tb_producto
                SET
                    prod_nombre = ?,
                    prod_desc = ?,
                    fecha_modi=now()
                WHERE
                    prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_desc);
            $sql->bindValue(3,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }



    }
?>