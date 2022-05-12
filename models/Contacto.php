<?php
class Contacto
{
  private $id;
  private $nombre;
  private $empresa;
  private $telefono;
  private $mail;
  private $comentario;
  private $mensajeoperacion;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  /**
   * @param model<Usuario>
   */
  public function setEmpresa($empresa)
  {
    $this->empresa = $empresa;
  }

  public function getEmpresa()
  {
    return $this->empresa;
  }

  /**
   * @param model<Usuario>
   */
  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }

  /**
   * @param model<Usuario>
   */
  public function setMail($mail)
  {
    $this->mail = $mail;
  }

  public function getMail()
  {
    return $this->mail;
  }

  /**
   * @param model<Usuario>
   */
  public function setComentario($comentario)
  {
    $this->comentario = $comentario;
  }

  public function getComentario()
  {
    return $this->comentario;
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
    $this->nombre = "";
    $this->empresa = "";
    $this->telefono = "";
    $this->mail = "";
    $this->comentario = "";
    $this->mensajeoperacion = "";
  }

  public function setear($id, $nombre, $empresa, $telefono, $mail, $comentario)
  {
    $this->setId($id);
    $this->setNombre($nombre);
    $this->setEmpresa($empresa);
    $this->setTelefono($telefono);
    $this->setMail($mail);
    $this->setComentario($comentario);
  }


  public function cargar()
  {
    $base = new BaseDatos();
    $sql = "SELECT * FROM contactos WHERE id = " . $this->getId();
    if (!$base->Iniciar()) {
      $this->setMensajeoperacion("categoriaItem->cargar: " . $base->getError()[2]);
      return false;
    }

    if ($base->Ejecutar($sql) > 0) {
      $row = $base->Registro();

      $this->setear($row['id'], $row['nombre'], $row['empresa'], $row['telefono'], $row['mail'], $row['comentario']);
    }

    return true;
  }

  public function insertar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO contactos( nombre, empresa, telefono, mail, comentario ) ";
    $sql .= "VALUES('" . $this->getNombre() . "', '" . $this->getEmpresa() . "', '" . $this->getTelefono() . "', '"  . $this->getMail() . "', '" .  $this->getComentario() . "');";
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
    $sql = "UPDATE contactos SET nombre='" . $this->getNombre() . "', empresa='" . $this->getEmpresa() . "'" . "', telefono='" . $this->getTelefono() . "'" . "', mail='" . $this->getMail() . "'" . "', comentario='" . $this->getComentario() . "'";
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
    $sql = "DELETE FROM contactos WHERE id =" . $this->getId();
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

    $sql = "SELECT * FROM contactos ";

    if ($parametro != "") {
      $sql .= 'WHERE ' . $parametro;
    }

    $res = $base->Ejecutar($sql);
    if ($res > -1) {
      if ($res > 0) {
        while ($row = $base->Registro()) {
          // armar tipo de elemento a devolver
          $arr = $obj = null;
          if ($as_array) {
            $arr = $row;
          } else {
            $obj = new Contacto();
            $obj->setear($row['id'], $row['nombre'], $row['empresa'], $row['telefono'], $row['mail'], $row['comentario']);
          }

          array_push($arreglo, $arr ? $arr : $obj);
        }
      }
    }

    return $arreglo;
  }
}
