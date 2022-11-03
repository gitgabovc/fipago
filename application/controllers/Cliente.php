<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{

	public function index()
	{

		$lista = $this->cliente_model->listaclientes();
		$data['clientes'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('listacliente', $data);
		$this->load->view('inc/footerlte');
	}

	public function agregar()
	{

		$this->load->view('inc/headerlte');
		$this->load->view('formulariocliente');
		$this->load->view('inc/footerlte');
	}

	public function agregarbd()
	{

		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['saldo'] = $_POST['saldo'];


		$lista = $this->cliente_model->agregarcliente($data);
		redirect('cliente/index', 'refresh');
	}

	public function eliminarbd()
	{

		$idCliente = $_POST['idCliente'];
		$this->cliente_model->eliminarcliente($idCliente);
		redirect('cliente/index', 'refresh');
	}

	public function modificar()
	{
		$idCliente = $_POST['idCliente'];
		$data['infocliente'] = $this->cliente_model->recuperarcliente($idCliente);

		$this->load->view('inc/headerlte');
		$this->load->view('formulariomodificarcliente', $data);
		$this->load->view('inc/footerlte');
	}

	public function modificarbd()
	{
		$idCliente = $_POST['idCliente'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['saldo'] = $_POST['saldo'];
		$nombrearchivo=$idCliente.".jpg";
		$config['upload_path']='./uploads';
		$config['file_name']=$nombrearchivo;
		$direccion = "./uploads/".$nombrearchivo;
		if (file_exists($direccion)) {
			
			unlink($direccion);
		}
		clearstatcache();
		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			$data['error']=$this->upload->display_errors();
		}
		else{
			$data['foto']=$nombrearchivo;
			
		}
		
		
		$this->cliente_model->modificarcliente($idCliente, $data);
		$this->upload->data();
		redirect('cliente/index', 'refresh');
	}

	public function deshabilitarbd()
	{
		$idCliente = $_POST['idCliente'];
		$data['habilitado'] = '0';

		$this->cliente_model->modificarcliente($idCliente, $data);
		redirect('cliente/index', 'refresh');
	}

	public function deshabilitados()
	{

		$lista = $this->cliente_model->listaclientesdeshabilitados();
		$data['clientes'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('listadeshabilitadoscliente', $data);
		$this->load->view('inc/footerlte');
	}

	public function habilitarbd()
	{
		$idCliente = $_POST['idCliente'];
		$data['habilitado'] = '1';

		$this->cliente_model->modificarcliente($idCliente, $data);
		redirect('cliente/deshabilitados', 'refresh');
	}
}
