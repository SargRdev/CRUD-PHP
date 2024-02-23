<?php

    require_once("../config/conexion.php");
    require_once("../model/producto.php");

    $producto = new Producto(){

        switch($_GET["op"]){

            case "listar": 
                $datos = $area->get_producto();
                $data = Array();
                foreach($datos as row){
                    $sub_array = array();
                    $sub_array[] = $row["prod_nom"];
                    $sub_array[] = '<button type = "button" onclick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></div></button>';
                    $sub_array[] = '<button type = "button" onclick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></div></button>';
                }
                break;
        }

        $results = array(
            "sEcho" =>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data);
            "aaData"=>$data);
        echo json_encode($results);
        )
    }

?>