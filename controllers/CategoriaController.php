<?php
class CategoriaController
{
  /**
   * @param array Donde ['nombre-columna' => 'valor']
   * @return object<Categoria>
   */
  private function cargarObjeto($param)
  {
    $categorias = null;
    if (array_key_exists('id', $param) and array_key_exists('descripcion', $param) and array_key_exists('estacion', $param)) {
      $categorias = new Categoria();
      $categorias->setear($param['id'], $param['descripcion'], $param['estacion']);
    }

    return $categorias;
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
   * @return object<Categoria> $categorias
   */
  public function alta($param)
  {
    $param['id'] = null;
    $categorias = $this->cargarObjeto($param);

    if (!$categorias != null or !$categorias->insertar()) {
      return false;
    }

    return $categorias;
  }

  /**
   * @param array $param
   * @return boolean
   */
  public function baja($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $categorias = $this->cargarObjeto($param);

      if ($categorias != null and $categorias->eliminar()) {
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

      $categorias = $this->cargarObjeto($param);

      if ($categorias != null and $categorias->modificar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * @param array $param
   * @param boolean $as_array if you want to recieve data as an array, instead of objects
   * @return array<Categoria>  
   */
  public function buscar($param, $as_array = false)
  {
    $where = " true ";
    if ($param <> NULL) {
      if (isset($param['id_estacion']))
        $where .= " and id_estacion = '" . $param['id_estacion'] . "'";
      if (isset($param['id']))
        $where .= " and id = '" . $param['id'] . "'";
      if (isset($param['descripcion']))
        $where .= " and descripcion = '" . $param['descripcion'] . "'";
    }

    $categorias = new Categoria();
    $categoriass = $categorias->listar($where, $as_array);

    return $categoriass;
  }
}
