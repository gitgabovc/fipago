<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conductor extends CI_Controller
{




	public function __construct()
	{
		parent::__construct();
	}



	public function index()
	{

		$lista = $this->conductor_model->listaconductores();
		$data['conductor'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('conductor/lista', $data);
		$this->load->view('inc/footerlte');
	}

	public function listar_datos()
	{

		//lo cargamos a un array relacional
		$data = array(
			"opcion" => "listar",
			"conductores" => $this->conductor_model->listaconductores(),
);

		$this->load->view('conductor/option', $data);
	}


	public function agregar_bd()
	{
		$nombre = trim($_POST['nombre']);
		$primerAp = trim($_POST["primerAp"]);
		$segundoAp  = trim($_POST["segundoAp"]);
		$ci  = trim($_POST["ci"]);
		$cuenta  = trim($_POST["cuenta"]);
		$pass  = trim($_POST["pass"]);
		$fechaCreacion  = trim($_POST["fechaCreacion"]);
		$telefono  = trim($_POST["telefono"]);
		$direccion  = trim($_POST["direccion"]);

		// echo $fechaCreacion;

		$data = array(
			'nombre' => $nombre,
			'primerAp' => $primerAp,
			'segundoAp'  => $segundoAp,
			'ci'  => $ci,
			'cuenta'  => $cuenta,
			'pass'  => $pass,
			'fechaCreacion'  => $fechaCreacion,
			'telefono'  => $telefono,
			'direccion'  => $direccion,
		);

		// $lista = $this->Mmedicamento->agregar_medicamento($data);
		$lista = $this->conductor_model->agregarconductor($data);
	}

	public function eliminar()
	{
		echo 'hola';
		// $idConductor = $_POST['idConductor'];
		$idConductor = $_POST['idConductor'];
		$this->conductor_model->eliminarconductor($idConductor);
	}




	//Recibimos el id para recuperar la informacion de la bd
	public function editar_datos()
	{
		$idConductor = $_POST['idConductor'];
		$data = array(
			"opcion" => "editar",
			"conductoress" => $this->conductor_model->recuperarconductor($idConductor),
		);

		$this->load->view('conductor/option', $data);
	}
	public function traer_datos()
	{
		$idConductor = $_POST['idConductor'];
		$data = array(
			"opcion" => "eliminar",
			"conductoresss" => $this->conductor_model->recuperarconductor($idConductor),
		);

		$this->load->view('conductor/option', $data);
	}

	public function guardar_datos()
	{

		$idConductor = $_POST['idConductor'];
		$nombre = trim($_POST['nombre']);
		$primerAp = trim($_POST["primerAp"]);
		$segundoAp  = trim($_POST["segundoAp"]);
		$ci  = trim($_POST["ci"]);
		$cuenta  = trim($_POST["cuenta"]);
		$pass  = trim($_POST["pass"]);
		$fechaCreacion  = trim($_POST["fechaCreacion"]);
		$telefono  = trim($_POST["telefono"]);
		$direccion  = trim($_POST["direccion"]);

		$data = array(
			'nombre' => $nombre,
			'primerAp' => $primerAp,
			'segundoAp'  => $segundoAp,
			'ci'  => $ci,
			'cuenta'  => $cuenta,
			'pass'  => $pass,
			'fechaCreacion'  => $fechaCreacion,
			'telefono'  => $telefono,
			'direccion'  => $direccion,
		);

		$this->conductor_model->modificarconductor($idConductor, $data);
	}

	public function buscar_en_bd($pag = 1)
	{
		$pag--;

		if ($pag < 0) {
			$pag = 0;
		}


		$pag_size = 3;
		$offset = $pag * $pag_size;

		$lista = $this->Mmedicamento->pagination($pag_size, $offset);
		$data['medicamento'] = $lista;


		// aca empieza

		$palabra_buscar = $_POST['palabra'];

		$data = array(
			"opcion" => "buscador",
			"medicamentos" => $this->Mmedicamento->buscar($palabra_buscar),
			'last_pag' => ceil($this->Mmedicamento->count() / $pag_size),
			'current_pag' => $pag,

		);
		$this->load->view('medicamento/VO_medicamento', $data);
	}

	//cargar el formulario al modal

	public function subir_modal()
	{
		$data['opcion']="formulario";
		
		$this->load->view('conductor/option', $data);
	}

	public function cerrar_session()
	{
		$this->session->sess_destroy();
		echo '<script type="text/javascript">
		window.location.href ="' . base_url() . 'Clogin";
		 </script>';
	}

	//paginacion



	public function recuperar_datos_detalle()
	{

		$id_medicamento = $_POST['id_medicamento'];
		$data = array(
			"opcion" => "detalle",
			"medicament" => $this->Mmedicamento->recuperar_medicamento_con_id($id_medicamento),
		);

		$this->load->view('medicamento/VO_medicamento', $data);
	}
}
