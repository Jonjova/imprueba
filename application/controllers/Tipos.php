<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tipos_m', 't', true);
    }

    public function index()
    {
        //Encabezado 
        $data = array('title' => 'Tipos de maquinas');
        $this->load->view('layout/header', $data);
        $this->load->view('layout/nav');
        //Body form_tipos => hago un llamado de este para que la lectura sea mucho mejor
        $data['form_tipo_maquina'] = $this->load->view('Tipos_maquina/form_tipos', null, true);
        $this->load->view('Tipos_maquina/index_tipos', $data);

        //Pie de pagina mostrar_tipo_maquinas
        $this->load->view('layout/footer');
    }
    //Mostrar con ajax y datatable
    public function mostrar_tipos_maquina()
    {

        $resultList = $this->t->mostrar_tipo_maquinas();
        $result = array();
        $editar = '';
        $i = 1;
        if (!empty($resultList)) {

            foreach ($resultList as $key => $value) {
                //boton de editar con el que obtenemos un id
                $editar = '<a onclick="obtenMaquina(' . $value['TIPO_ID'] . ')" > <i class="fas fa-edit fa-lg"></i></a> ';
                $eliminar = '<a onclick="eliminar_maquina(' . $value['TIPO_ID'] . ')"  > <i class="fas fa fa-solid fa-eraser fa-lg"></i></a> ';

                $result['data'][] = array(
                    $i++,
                    $value['TIPO_NOMBRE'],
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
        $resultData = $this->t->obteneridmaquina(array('TIPO_ID' => $id_maquina));
        echo json_encode($resultData);
    }
    // Guardar Alumnos
    public function Guardar()
    {
        //date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
        $insert = $this->t->insert_maquina($_POST);
        //var_dump($insert);
        if ($insert == TRUE) {
            echo "true";
        }
    }

    //Actualizar Alumnos
	public function Actualizar()
	{
		date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
		$id = $this->input->post('TIPO_ID');
		//echo json_encode($whereAlumno);
		 $actualizar = $this->t->actualizar_machine('tipo', $_POST, array('TIPO_ID' => $id));
		
		if ($actualizar == TRUE)
		{
			echo json_encode('Datos actualizados!');
        }
        else
        {
            echo json_encode('Error al actualizar!');
		}

	}
    //Metodo Eliminar 
	public function Eliminar($id)
	{
		return $this->t->eliminar_maquina($id);
	}
}
