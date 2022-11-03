<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarjeta extends CI_Controller
{




	public function __construct()
	{
		parent::__construct();
	}



	public function index()
	{
		$this->load->view('inc/headerlte');
		$this->load->view('tarjeta/lista');
		$this->load->view('inc/footerlte');
	}

	public function listar_datos()
	{

		//lo cargamos a un array relacional
		$data = array(
			"opcion" => "listar",
			"tarjetas" => $this->tarjeta_model->listatarjetas(),
			// "medicamentos" => $this->Mmedicamento->listar_medicamentos(),


		);

		$this->load->view('tarjeta/option', $data);
	}


	public function agregar_bd()
	{
		$codigo = trim($_POST['codigo']);
		$fechaVencimiento = trim($_POST["fechaVencimiento"]);


		// echo $fechaCreacion;

		$data = array(
			'codigo' => $codigo,
			'fechaVencimiento' => $fechaVencimiento
		);

		// $lista = $this->Mmedicamento->agregar_medicamento($data);
		$lista = $this->tarjeta_model->agregartarjeta($data);
	}

	public function eliminar()
	{

		$idTarjeta = $_POST['idTarjeta'];
		$this->tarjeta_model->eliminartarjeta($idTarjeta);
	}




	//Recibimos el id para recuperar la informacion de la bd
	public function editar_datos()
	{
		$idTarjeta = $_POST['idTarjeta'];
		$data = array(
			"opcion" => "editar",
			"tarjetass" => $this->tarjeta_model->recuperartarjeta($idTarjeta),
		);

		$this->load->view('tarjeta/option', $data);
	}
	public function traer_datos()
	{
		$idTarjeta = $_POST['idTarjeta'];
		$data = array(
			"opcion" => "eliminar",
			"tarjetasss" => $this->tarjeta_model->recuperartarjeta($idTarjeta),
		);

		$this->load->view('tarjeta/option', $data);
	}

	public function guardar_datos()
	{

		$idTarjeta = $_POST['idTarjeta'];
		$codigo = trim($_POST['codigo']);
		$fechaVencimiento = trim($_POST["fechaVencimiento"]);


		$data = array(
			'codigo' => $codigo,
			'fechaVencimiento' => $fechaVencimiento,

		);

		$this->tarjeta_model->modificartarjeta($idTarjeta, $data);
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
		$data = array(
			"opcion" => "formulario",
		);
		$this->load->view('tarjeta/option', $data);
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
	public function imprimir($codigo = 0,$saldoMonetario=0)
	{

		$data['codigo'] = $codigo;
		$data['saldoMonetario'] = $saldoMonetario;
		$this->load->view('tarjeta/imprimir', $data);
	}
}
