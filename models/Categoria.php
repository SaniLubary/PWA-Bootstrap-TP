<?php
class Categoria
{
  private $id;
  private $descripcion;
  private $estacion;
  private $mensajeoperacion;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  /**
   * @param model<Usuario>
   */
  public function setEstacion($estacion)
  {
    $this->estacion = $estacion;
  }

  public function getEstacion()
  {
    return $this->estacion;
  }


  public function getMensajeoperacion()
  {
    return $this->mensajeoperacion;
  }

  public function setMensajeoperacion($mensajeoperacion)
  {
    $this->mensajeoperacion = $mensajeoperacion;
  }

  public function __construct()
  {
    $this->id = "";
    $this->descripcion = "";
    $this->estacion = "";
    $this->mensajeoperacion = "";
  }

  public function setear($id, $descripcion, $estacion)
  {
    $this->setId($id);
    $this->setDescripcion($descripcion);
    $this->setEstacion($estacion);
  }


  public function cargar()
  {
    $base = new BaseDatos();
    $sql = "SELECT * FROM categorias WHERE id = " . $this->getId();
    if (!$base->Iniciar()) {
      $this->setMensajeoperacion("categoriaItem->cargar: " . $base->getError()[2]);
      return false;
    }

    if ($base->Ejecutar($sql) > 0) {
      $row = $base->Registro();

      $estacion = Estacion::listar(' true and estaciones_id = ' . $row['estaciones_id']);
      if (!empty($estacion)) $estacion = $estacion[0];

      $this->setear($row['id'], $row['descripcion'], $row['id']);
    }

    return true;
  }

  public function insertar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO categorias( descripcion, estaciones_id ) ";
    $sql .= "VALUES('" . $this->getDescripcion() . "', '" . $this->getEstacion()->getId() . "');";
    if ($base->Iniciar()) {
      if ($elid = $base->Ejecutar($sql)) {
        $this->setId($elid);
        $resp = true;
      } else {
        $this->setMensajeoperacion("categoriaItem->insertar: " . $base->getError()[2]);
      }
    } else {
      $this->setMensajeoperacion("categoriaItem->insertar: " . $base->getError()[2]);
    }
    return $resp;
  }

  public function modificar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "UPDATE categorias SET descripcion='" . $this->getDescripcion() . "', estacion='" . $this->getEstacion()->getId() . "'";
    $sql .= " WHERE id = " . $this->getId();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeoperacion("categoriaItem->modificar 1: " . $base->getError());
      }
    } else {
      $this->setMensajeoperacion("categoriaItem->modificar 2: " . $base->getError());
    }
    return $resp;
  }

  public function eliminar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM categorias WHERE id =" . $this->getId();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeoperacion("categoriaItem->eliminar: " . $base->getError());
      }
    } else {
      $this->setMensajeoperacion("Productoo->eliminar: " . $base->getError());
    }
    return $resp;
  }

  public static function listar($parametro = "", $as_array = false)
  {
    $arreglo = array();
    $base = new BaseDatos();

    $sql = "SELECT * FROM categorias ";

    if ($parametro != "") {
      $sql .= 'WHERE ' . $parametro;
    }

    $res = $base->Ejecutar($sql);
    if ($res > -1) {
      if ($res > 0) {
        while ($row = $base->Registro()) {
          // Obtener estacion
          $estacionesController = new EstacionController();
          $estacion = $estacionesController->buscar(['estaciones_id' => $row['estaciones_id']], true);
          if (!empty($estacion)) $estacion = $estacion[0];

          // armar tipo de elemento a devolver
          $arr = $obj = null;
          if ($as_array) {
            $arr = ["id" => $row['id'], "descripcion" => $row['descripcion'], "estacion" => $estacion];
          } else {
            $obj = new Categoria();
            $obj->setear($row['id'], $row['descripcion'], $estacion);
          }

          array_push($arreglo, $arr ? $arr : $obj);
        }
      }
    }

    return $arreglo;
  }
}
