<?php

class Tab
{
  private $id;
  private $contenido;
  private $mensajeoperacion;

  public function getId()
  {
    return $this->id;
  }
  public function setId($valor)
  {
    $this->id = $valor;
  }
  public function getContenido()
  {
    return $this->contenido;
  }
  public function setContenido($valor)
  {
    $this->contenido = $valor;
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
    $this->contenido = "";
    $this->mensajeoperacion = "";
  }

  public function setear($id, $contenido)
  {
    $this->setId($id);
    $this->setContenido($contenido);
  }

  public function cargar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM tabs WHERE id = " . $this->getId();
    if ($base->Iniciar()) {
      $resp = $base->Ejecutar($sql);
      if ($resp > -1) {
        if ($resp > 0) {
          $row = $base->Registro();
          $this->setear($row['id'], $row['contenido']);
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
    $sql = "INSERT INTO tabs(contenido)  VALUES('" . $this->getContenido() . "');";
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
    $sql = "UPDATE tabs SET contenido='" . $this->getContenido() . "' WHERE id=" . $this->getId();
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
    $sql = "DELETE FROM tabs WHERE id =" . $this->getId();
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

  public static function listar($parametro = "")
  {
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM tabs ";
    if ($parametro != "") {
      $sql .= 'WHERE ' . $parametro;
    }
    $resp = $base->Ejecutar($sql);
    if ($resp > -1) {
      if ($resp > 0) {
        while ($row = $base->Registro()) {
          $obj = new Tab();
          $obj->setear($row['id'], $row['contenido']);
          array_push($arreglo, $obj);
        }
      }
    }

    return $arreglo;
  }
}
