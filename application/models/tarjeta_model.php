<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarjeta_model extends CI_Model
{

	public function listatarjetas()
	{
		$this->db->select('*');
		$this->db->from('tarjeta');
		$this->db->where('estado', '1');
		$this->db->order_by('idTarjeta', 'DESC');
		return $this->db->get();
	}

	public function agregartarjeta($data)
	{
		$this->db->insert('tarjeta', $data);
	}

	public function eliminartarjeta($idTarjeta)
	{
		// $this->db->from('conductores'); //tabla
		// $this->db->where('idTarjeta', $idTarjeta);
		// $this->db->update('estado', '0');
		// $this->db->update('conductores', "estado", "0");
		// $this->db->where('idTarjeta', $idTarjeta);
		// $this->db->delete('conductores');

		$this->db->where('idTarjeta', $idTarjeta);
		$this->db->set('estado', 0);
		$this->db->update('tarjeta');
	}

	public function recuperartarjeta($idTarjeta)
	{
		$this->db->select('*'); //select*
		$this->db->from('tarjeta'); //tabla
		$this->db->where('idTarjeta', $idTarjeta);
		return $this->db->get();
	}

	public function modificartarjeta($idTarjeta, $data)
	{
		$this->db->where('idTarjeta', $idTarjeta);
		$this->db->update('tarjeta', $data);
	}

	public function listaconductoresdeshabilitados()
	{
		$this->db->select('*'); //select*
		$this->db->from('conductores'); //tabla
		$this->db->where('habilitado', '0');
		return $this->db->get();	//devolucion del resultado de la consulta
	}
}
