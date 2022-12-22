<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipos_m extends CI_Model
{
	// result_array devuelve datos de tipo de matriz asociativa. 
	public function mostrar_tipo_maquinas()
	{
		$datos = $this->db->select('*')
			->from('tipo')
			->get();
		return $datos->result_array();
	}
	//Obtener Maquina Id
	public function obteneridmaquina($where)
	{
		$query = $this->db->select('*')
			->from('TIPO')
			->where($where)
			->get();
		return $query->row_array();
	}

	// Insertar Maquina
	public function insert_maquina($data)
	{
		if ($this->db->insert('TIPO', $data)) {
			return true;
		} else {
			return false;
		}
	}
	// Actualizar Maquina
	public function actualizar_machine($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}

	//Eliminar Maquina
	function eliminar_maquina($id)
	{
		$this->db->where('TIPO_ID', $id);
		$this->db->delete('TIPO');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
