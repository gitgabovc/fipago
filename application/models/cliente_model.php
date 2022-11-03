<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente_model extends CI_Model
{

	public function listaclientes()
	{
		$this->db->select('*'); //select*
		$this->db->from('clientes'); //tabla
		$this->db->where('habilitado', '1');
		$this->db->order_by('idCliente', 'desc');
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function agregarcliente($data)
	{
		$this->db->insert('clientes', $data);
	}

	public function eliminarcliente($idCliente)
	{
		$this->db->where('idCliente', $idCliente);
		$this->db->delete('clientes');
	}

	public function recuperarcliente($idCliente)
	{
		$this->db->select('*'); //select*
		$this->db->from('clientes'); //tabla
		$this->db->where('idCliente', $idCliente);
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function modificarcliente($idCliente, $data)
	{
		$this->db->where('idCliente', $idCliente);
		$this->db->update('clientes', $data);
	}

	public function listaclientesdeshabilitados()
	{
		$this->db->select('*'); //select*
		$this->db->from('clientes'); //tabla
		$this->db->where('habilitado', '0');
		return $this->db->get();	//devolucion del resultado de la consulta
	}
}
