<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maquina_m extends CI_Model
{
	// result_array devuelve datos de tipo de matriz asociativa. 
	public function mostrar_maquinas($tipo_maquina)
	{
		if(!empty($tipo_maquina)){
			$this->db->where('TIPO_ID',$tipo_maquina);  
		}
		$datos = $this->db->select('*')
			->from('MAQUINA')
			->join('TIPO', "TIPO_ID = M_TIPO_ID")
			->get();

		return $datos->result_array();
	}
	//Obtener Maquina Id
	public function obteneridmaquina($where)
	{
		$query = $this->db->select('*')
			->from('MAQUINA')
			->join('TIPO', "TIPO_ID = M_TIPO_ID")
			->where($where)
			->get();
		return $query->row_array();
	}

	// Actualizar Maquina
	public function actualizar_machine($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}

	// Insertar Maquina
	public function insert_maquina($data)
	{
		if ($this->db->insert('MAQUINA', $data)) {
			return true;
		} else {
			return false;
		}
	}

	//llenado Select tipo de maquina
	public function obt_xidmaquina()
	{
		$datos = $this->db->get('tipo');
		return $datos->result_array();
	}

	//Eliminar Maquina
	function eliminar_maquina($id)
	{
		$this->db->where('M_ID', $id);
		$this->db->delete('MAQUINA');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
