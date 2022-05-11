<?php

class Estacion
{
  private $id;
  private $descripcion;
  private $mensajeoperacion;

  public function getId()
  {
    return $this->id;
  }
  public function setId($valor)
  {
    $this->id = $valor;
  }
  public function getDescripcion()
  {
    return $this->descripcion;
  }
  public function setDescripcion($valor)
  {
    $this->descripcion = $valor;
  }
  public function getmensajeoperacion()
  {
    return $this->mensajeoperacion;
  }
  public function setmensajeoperacion($valor)
  {
    $this->mensajeoperacion = $valor;
  }


  public function __construct()
  {
    $this->id = "";
    $this->descripcion = "";
    $this->mensajeoperacion = "";
  }

  public function setear($id, $descripcion)
  {
    $this->setId($id);
    $this->setDescripcion($descripcion);
  }

  public function cargar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM estaciones WHERE id = " . $this->getId();
    if ($base->Iniciar()) {
      $resp = $base->Ejecutar($sql);
      if ($resp > -1) {
        if ($resp > 0) {
          $row = $base->Registro();
          $this->setear($row['id'], $row['descripcion']);
        }
      }
    } else {
      $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
    }
    return $resp;
  }

  public function insertar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO estacion(descripcion)  VALUES('" . $this->getDescripcion() . "');";
    if ($base->Iniciar()) {
      if ($elid = $base->Ejecutar($sql)) {
        $this->setId($elid);
        $resp = true;
      } else {
        $this->setmensajeoperacion("Tabla->insertar: " . $base->getError()[2]);
      }
    } else {
      $this->setmensajeoperacion("Tabla->insertar: " . $base->getError()[2]);
    }
    return $resp;
  }

  public function modificar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "UPDATE estaciones SET descripcion='" . $this->getDescripcion() . "' WHERE id=" . $this->getId();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setmensajeoperacion("Tabla->modificar 1: " . $base->getError());
      }
    } else {
      $this->setmensajeoperacion("Tabla->modificar 2: " . $base->getError());
    }
    return $resp;
  }

  public function eliminar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM estaciones WHERE id =" . $this->getId();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
      }
    } else {
      $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
    }
    return $resp;
  }

  public static function listar($parametro = "", $as_array = false)
  {
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM estaciones ";
    if ($parametro != "") {
      $sql .= 'WHERE ' . $parametro;
    }
    $resp = $base->Ejecutar($sql);
    if ($resp > -1) {
      if ($resp > 0) {
        while ($row = $base->Registro()) {

          // se arma elemento a devolver segun tipo deseado
          $arr = $obj = null;
          if ($as_array) {
            $arr = $row;
          } else {
            $obj = new Estacion();
            $obj->setear($row['id'], $row['descripcion']);
          }

          array_push($arreglo, $arr ? $arr : $obj);
        }
      }
    }

    return $arreglo;
  }
}
