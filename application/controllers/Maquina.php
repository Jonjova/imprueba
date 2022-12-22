<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maquina extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// la 'm' es un alias para poder hacer mas corto el nombre del modelo 
		$this->load->model('Maquina_m', 'm', true);
	}
	public function index()
	{
		//Encabezado 
		$data = array('title' => 'Maquinas');
		$this->load->view('layout/header', $data);
		$this->load->view('layout/nav');
		//Body form_maquina => hago un llamado de este para que la lectura sea mucho mejor
		$data['form_maquina'] = $this->load->view('Maquina/form_maquina', null, true);
		$this->load->view('Maquina/index_maquina', $data);

		//Pie de pagina
		$this->load->view('layout/footer');
	}
	//Mostrar con ajax y datatable
	public function mostrar_maquina()
	{

		$resultList = $this->m->mostrar_maquinas();
		$result = array();
		$editar = '';
		$i = 1;
		if (!empty($resultList)) {

			foreach ($resultList as $key => $value) {
				//boton de editar con el que obtenemos un id
				$editar = '<a onclick="obtenMaquina(' . $value['M_ID'] . ')" > <i class="fas fa-edit fa-lg"></i></a> ';
				$eliminar = '<a onclick="eliminar_maquina(' . $value['M_ID'] . ')"  > <i class="fas fa fa-solid fa-eraser fa-lg"></i></a> ';

				$result['data'][] = array(
					$value['M_CODIGO'],
					$value['M_NOMBRE'],
					$value['TIPO_NOMBRE'],
					$value['M_DESCRIPCION'],
					$editar . '  ' . $eliminar,

				);
			}
		} else {
			$result['data'] = array();
		}

		echo json_encode($result);
	}


	//Obtener por el id la maquina 
	public function obtener_maquina($id_maquina)
	{
		$resultData = $this->m->obteneridmaquina(array('M_ID' => $id_maquina));
		echo json_encode($resultData);
	}

	// Guardar Alumnos
	public function Guardar()
	{
		//date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
		$insert = $this->m->insert_maquina($_POST);
		//var_dump($insert);
		if ($insert == TRUE) {
			echo "true";
		}
	}
	//Actualizar Alumnos
	public function Actualizar()
	{
		date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
		$id = $this->input->post('M_ID');
		//echo json_encode($whereAlumno);
		 $actualizar = $this->m->actualizar_machine('maquina', $_POST, array('M_ID' => $id));
		
		if ($actualizar == TRUE)
		{
			echo json_encode('Datos actualizados!');
        }
        else
        {
            echo json_encode('Error al actualizar!');
		}

	}
	//LLenar select con ajax 
	public function obt_maquinaxid()
	{
		$datos = $this->m->obt_xidmaquina();
		echo json_encode($datos);
	}

	//Metodo Eliminar 
	public function Eliminar($id)
	{
		return $this->m->eliminar_maquina($id);
	}
}
