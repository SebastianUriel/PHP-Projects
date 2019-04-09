<?php

    foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Brackets-php/DB-MySql/CRUD/*.php") as $filename)
    {
        include $filename;
    }

    class adm_Libro{
        
        public function insertLibro($Libro){
            $crud= new CrudLibro();
            return $crud->insertar($Libro);
        }
        
        public function deleteLibro($Libro){
            $crud= new CrudLibro();
            return $crud->eliminar($Libro);
        }
        
    }

?>