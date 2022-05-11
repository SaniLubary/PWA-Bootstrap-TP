<?php
class TabController
{
  /**
   * @param array Donde ['nombre-columna' => 'valor']
   * @return object<Tab>
   */
  private function cargarObjeto($param)
  {
    $tab = null;
    if (array_key_exists('id', $param) and array_key_exists('contenido', $param)) {
      $tab = new Tab();
      $tab->setear($param['id'], $param['contenido']);
    }

    return $tab;
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
   * @return object<Tab> $tab
   */
  public function alta($param)
  {
    $param['id'] = null;
    $param['contenido'] = null;
    $tab = $this->cargarObjeto($param);

    if (!$tab != null or !$tab->insertar()) {
      return false;
    }

    return $tab;
  }

  /**
   * @param array $param
   * @return boolean
   */
  public function baja($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $tab = $this->cargarObjeto($param);

      if ($tab != null and $tab->eliminar()) {
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

      $tab = $this->cargarObjeto($param);

      if ($tab != null and $tab->modificar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * @param array $param
   * @param boolean $porEstado True si se quiere buscar por estado de tabla EstacionesEstado
   * @return array<Tab>  
   */
  public function buscar($param, $as_array = false)
  {
    $where = " true ";
    if ($param <> NULL) {
      if (isset($param['id']))
        $where .= " and id = '" . $param['id'] . "'";
      if (isset($param['contenido']))
        $where .= " and contenido = '" . $param['contenido'] . "'";
    }

    $tab = new Tab();
    $estacioness = $tab->listar($where, $as_array);

    return $estacioness;
  }
}
