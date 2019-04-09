<?php

    foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Brackets-php/Model/*.php") as $filename)
    {
        include $filename;
    }

    foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Brackets-php/Controller/*.php") as $filename)
    {
        include $filename;
    }

    class v_Libro{

        public function viewLibro1($nombre, $autor, $edicion) {
            $libro= new Libro();
            $adm_Libro = new adm_Libro();

            $libro->setNombre($nombre);
            $libro->setAutor($autor);
            $libro->setAnio_edicion($edicion);

            return $adm_Libro->insertLibro($libro);
        }
        
        
        public function viewLibro2($id){
            $libro = new Libro();
            $adm_Libro = new adm_Libro();
            
            $libro->setId($id);
            
            return $adm_Libro->deleteLibro($libro);
        }
    }

?>