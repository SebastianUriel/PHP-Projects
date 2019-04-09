<?php
    
    foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/Brackets-php/DB-MySql/*.php") as $filename)
    {
        include $filename;
    }
    
    class CrudLibro{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertar($libro){
            try {
                $db=Db::conectar();
                $insert=$db->prepare('INSERT INTO libros values(NULL,:nombre,:autor,:anio_edicion)');
                $insert->bindValue('nombre',$libro->getNombre());
                $insert->bindValue('autor',$libro->getAutor());
                $insert->bindValue('anio_edicion',$libro->getAnio_edicion());
                $insert->execute();
                return "<script>alert('New record created successfully');</script>";
            } catch(PDOException $e) {
                return "<script>alert('Error: ". $e->getMessage() ."');</script>";
            }
		}
 
		// método para mostrar todos los libros
		public function mostrar(){
			$db=Db::conectar();
			$listaLibros=[];
			$select=$db->query('SELECT * FROM libros');
			foreach($select->fetchAll() as $libro){
				$myLibro= new Libro();
				$myLibro->setId($libro['id']);
				$myLibro->setNombre($libro['nombre']);
				$myLibro->setAutor($libro['autor']);
				$myLibro->setAnio_edicion($libro['anio_edicion']);
				$listaLibros[]=$myLibro;
			}
			return $listaLibros;
		}
 
		// método para eliminar un libro, recibe como parámetro el id del libro
		public function eliminar($libro){
            try {
                $db=Db::conectar();
                $eliminar=$db->prepare('DELETE FROM libros WHERE ID=:id');
                $eliminar->bindValue('id',$libro->getId());
                $eliminar->execute();
                return "<script>alert('Registro borrado');</script>";
            } catch(PDOException $e) {
                return "<script>alert('Error: ". $e->getMessage() ."');</script>";
            }
		}
 
		// método para buscar un libro, recibe como parámetro el id del libro
		public function obtenerLibro($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM libros WHERE ID=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$libro=$select->fetch();
			$myLibro= new Libro();
			$myLibro->setId($libro['id']);
			$myLibro->setNombre($libro['nombre']);
			$myLibro->setAutor($libro['autor']);
			$myLibro->setAnio_edicion($libro['anio_edicion']);
			return $myLibro;
		}
 
		// método para actualizar un libro, recibe como parámetro el libro
		public function actualizar($libro){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE libros SET nombre=:nombre, autor=:autor,anio_edicion=:anio  WHERE ID=:id');
			$actualizar->bindValue('id',$libro->getId());
			$actualizar->bindValue('nombre',$libro->getNombre());
			$actualizar->bindValue('autor',$libro->getAutor());
			$actualizar->bindValue('anio',$libro->getAnio_edicion());
			$actualizar->execute();
		}
	}
?>