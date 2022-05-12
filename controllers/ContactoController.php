<?php
class ContactoController
{
  /**
   * @param array Donde ['nombre-columna' => 'valor']
   * @return object<Contacto>
   */
  private function cargarObjeto($param)
  {
    $contacto = null;
    if (
      array_key_exists('id', $param) and array_key_exists('nombre', $param) and array_key_exists('empresa', $param)
      and array_key_exists('telefono', $param) and array_key_exists('mail', $param) and array_key_exists('comentario', $param)
    ) {
      $contacto = new Contacto();
      $contacto->setear($param['id'], $param['nombre'], $param['empresa'], $param['telefono'], $param['mail'], $param['comentario']);
    }

    return $contacto;
  }

  /**
   * @param array $param
   * @return boolean
   */
  private function seteadosCamposClaves($param)
  {
    if (!isset($param['id'])) return false;

    return true;
  }

  /**
   * @param array $param
   * @return object<Contacto> $contacto
   */
  public function alta($param)
  {
    $param['id'] = null;
    $contacto = $this->cargarObjeto($param);

    if (!$contacto != null or !$contacto->insertar()) {
      return $contacto;
    }

    return $contacto;
  }

  /**
   * @param array $param
   * @return boolean
   */
  public function baja($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $contacto = $this->cargarObjeto($param);

      if ($contacto != null and $contacto->eliminar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * @param array $param
   * @return boolean
   */
  public function modificacion($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {

      $contacto = $this->cargarObjeto($param);

      if ($contacto != null and $contacto->modificar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * @param array $param
   * @param boolean $as_array if you want to recieve data as an array, instead of objects
   * @return array<Contacto>  
   */
  public function buscar($param, $as_array = false)
  {
    $where = " true ";
    if ($param <> NULL) {
      if (isset($param['id_estacion']))
        $where .= " and id_estacion = '" . $param['id_estacion'] . "'";
      if (isset($param['id']))
        $where .= " and id = '" . $param['id'] . "'";
      if (isset($param['nombre']))
        $where .= " and nombre = '" . $param['nombre'] . "'";
    }

    $contacto = new Contacto();
    $contactos = $contacto->listar($where, $as_array);

    return $contactos;
  }
}
