<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conductor extends CI_Controller
{

	public function index()
	{

		$lista = $this->conductor_model->listaconductores();
		$data['conductores'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('lista', $data);
		$this->load->view('inc/footerlte');
	}
	public function listapdf()
	{

		$lista = $this->conductor_model->listaconductores();
		$lista = $lista->result();

		$this->pdf = new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages(); //numeracion
		$this->pdf->SetTitle('Lista de conductores'); //titulo de los plantas del documento o del pdf
		$this->pdf->SetLeftMargin(15); //margen izq.
		$this->pdf->SetRightMargin(15); //margen derecho
		$this->pdf->SetFillColor(210, 210, 210); //color de griss
		$this->pdf->SetFont('Arial', 'B', 11); //tipo de letra y tama;o
		$this->pdf->cell(30); //tamanio de la celda
		$this->pdf->Cell(120, 10, 'Lista de conductores', 0, 0, 'C', 1);
		//ancho, alto, texto, borde, orden de sig celda, Alineacion LCR, FILL 0 para NO y 1 para SI
		//orden de la sig celda    (0 derecha    1 siguiente linea   2 debajo)

		$this->pdf->Ln(15); //espaciado luego del titulo del documento
		$this->pdf->SetFont('Arial', 'B', 9);
		$this->pdf->Cell(10, 5, 'Nro', 'TBLR', 0, 'L', 1);
		$this->pdf->Cell(50, 5, 'Nombre', 'TBLR', 0, 'L', 1);
		$this->pdf->Cell(50, 5, 'Apellido Paterno', 'TBLR', 0, 'L', 1);
		$this->pdf->Cell(30, 5, 'Apellido Materno', 'TBLR', 0, 'L', 1);
		$this->pdf->Cell(30, 5, 'Ingreso', 'TBLR', 0, 'L', 1);
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial', '', 9);
		$num = 1;
		foreach ($lista as $row) {
			$nombre = $row->nombre;
			$primerApellido = $row->primerApellido;
			$segundoApellido = $row->segundoApellido;
			$ingreso = $row->ingreso;
			$this->pdf->Cell(10, 5, $num, 'TBLR', 0, 'L', 0);
			$this->pdf->Cell(50, 5, $nombre, 'TBLR', 0, 'L', 0);
			$this->pdf->Cell(50, 5, $primerApellido, 'TBLR', 0, 'L', 0);
			$this->pdf->Cell(30, 5, $segundoApellido, 'TBLR', 0, 'L', 0);
			$this->pdf->Cell(30, 5, $ingreso, 'TBLR', 0, 'L', 0);
			$this->pdf->Ln(5);
			$num++;
		}
		$this->pdf->Output("Listaconductores.pdf", "I");
	}

	public function agregar()
	{

		$this->load->view('inc/headerlte');
		$this->load->view('formulario');
		$this->load->view('inc/footerlte');
	}

	public function agregarbd()
	{

		$this->load->library('form_validation');
		//nombre del campo del formulario , alias, validaciones, msges de error
		$this->form_validation->set_rules(
			'nombre',
			'Nombre de estudiante',
			'required|min_length[5]|max_length[12]',
			array(
				'required' => 'Se requiere el nombre de estudiante', 'min_length' => 'Se rerquiere al menos 5 caracteres', 'max_length' => 'Debe ser menos de 12 caracteres'
			)
		);
		$this->form_validation->set_rules(
			'primerApellido',
			'Apellido del Conductor',
			'required|min_length[5]|max_length[12]',
			array(
				'required' => 'Se requiere el apellido del conductor', 'min_length' => 'Se rerquiere al menos 5 caracteres del apellido del conductor', 'max_length' => 'Debe ser menos de 12 caracteres el apellido del estudiante'
			)
		);
		$this->form_validation->set_rules(
			'segundoApellido',
			'Apellido materno del conductor',
			'required|min_length[5]|max_length[12]',
			array(
				'required' => 'Se requiere el apellido materno del conductor', 'min_length' => 'Se rerquiere al menos 5 caracteres del apellido materno del conductor', 'max_length' => 'Debe ser menos de 12 caracteres el apellido materno del estudiante'
			)
		);



		if ($this->form_validation->run() == FALSE) {
			$this->load->view('inc/headerlte');
			$this->load->view('formulario');
			$this->load->view('inc/footerlte');
		} else {
			$data['nombre'] = $_POST['nombre'];
			$data['primerApellido'] = $_POST['primerApellido'];
			$data['segundoApellido'] = $_POST['segundoApellido'];
			$data['ingreso'] = $_POST['ingreso'];
			$lista = $this->conductor_model->agregarconductor($data);
			redirect('conductor/index', 'refresh');
		}
	}

	public function eliminarbd()
	{

		$idConductor = $_POST['idConductor'];
		$this->conductor_model->eliminarconductor($idConductor);
		redirect('conductor/index', 'refresh');
	}

	public function modificar()
	{
		$idConductor = $_POST['idConductor'];
		$data['infoconductor'] = $this->conductor_model->recuperarconductor($idConductor);

		$this->load->view('inc/headerlte');
		$this->load->view('formulariomodificar', $data);
		$this->load->view('inc/footerlte');
	}

	public function modificarbd()
	{
		$idConductor = $_POST['idConductor'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['ingreso'] = $_POST['ingreso'];

		$this->conductor_model->modificarconductor($idConductor, $data);
		redirect('conductor/index', 'refresh');
	}

	public function deshabilitarbd()
	{
		$idConductor = $_POST['idConductor'];

		$data['habilitado'] = '0';

		$this->conductor_model->modificarconductor($idConductor, $data);
		redirect('conductor/index', 'refresh');
	}

	public function deshabilitados()
	{

		$lista = $this->conductor_model->listaconductoresdeshabilitados();
		$data['conductores'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('listadeshabilitados', $data);
		$this->load->view('inc/footerlte');
	}

	public function habilitarbd()
	{
		$idConductor = $_POST['idCoductor'];
		$data['habilitado'] = '1';

		$this->conductor_model->modificarconductor($idConductor, $data);
		redirect('conductor/deshabilitados', 'refresh');
	}
}
