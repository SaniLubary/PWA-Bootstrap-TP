<?php
class EstacionController
{
  /**
   * @param array Donde ['nombre-columna' => 'valor']
   * @return object<Estacion>
   */
  private function cargarObjeto($param)
  {
    $estaciones = null;
    if (array_key_exists('id', $param) and array_key_exists('descripcion', $param)) {
      $estaciones = new Estacion();
      $estaciones->setear($param['id'], $param['descripcion']);
    }

    return $estaciones;
  }

  /**
   * @param array $param
   * @return boolean
   */
  private function seteadosCamposClaves($param)
  {
    if (!isset($param['id']));
    return false;
    return true;
  }

  /**
   * @param array $param
   * @return object<Estacion> $estaciones
   */
  public function alta($param)
  {
    $param['id'] = null;
    $param['descripcion'] = null;
    $estaciones = $this->cargarObjeto($param);

    if (!$estaciones != null or !$estaciones->insertar()) {
      return false;
    }

    return $estaciones;
  }

  /**
   * @param array $param
   * @return boolean
   */
  public function baja($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $estaciones = $this->cargarObjeto($param);

      if ($estaciones != null and $estaciones->eliminar()) {
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

      $estaciones = $this->cargarObjeto($param);

      if ($estaciones != null and $estaciones->modificar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * @param array $param
   * @param boolean $porEstado True si se quiere buscar por estado de tabla EstacionesEstado
   * @param boolean $as_array if you want to recieve data as an array, instead of objects
   * @return array<Estacion>  
   */
  public function buscar($param, $as_array)
  {
    $where = " true ";
    if ($param <> NULL) {
      if (isset($param['id']))
        $where .= " and id = '" . $param['id'] . "'";
      if (isset($param['descripcion']))
        $where .= " and descripcion = '" . $param['descripcion'] . "'";
    }

    $estaciones = new Estacion();
    $estacioness = $estaciones->listar($where, $as_array);

    return $estacioness;
  }
}
