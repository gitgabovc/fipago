<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conductor_model extends CI_Model
{

	public function listaconductores()
	{
		$this->db->select('*');
		$this->db->from('conductor');
		$this->db->where('estado', '1');
		$this->db->order_by('idConductor', 'DESC');
		return $this->db->get();
	}

	public function agregarconductor($data)
	{
		$this->db->insert('conductor', $data);
	}

	public function eliminarconductor($idConductor)
	{
		// $this->db->from('conductor'); //tabla
		// $this->db->where('idConductor', $idConductor);
		// $this->db->update('estado', '0');
		// $this->db->update('conductor', "estado", "0");
		// $this->db->where('idConductor', $idConductor);
		// $this->db->delete('conductor');
		$fecha = date("Y-m-d h:m:s");
		$this->db->where('idConductor', $idConductor);
		$this->db->set('estado', 0);
		$this->db->set('d_del', $fecha);
		$this->db->update('conductor');
	}

	public function recuperarconductor($idConductor)
	{
		$this->db->select('*'); //select*
		$this->db->from('conductor'); //tabla
		$this->db->where('idConductor', $idConductor);
		return $this->db->get();
	}

	public function modificarconductor($idConductor, $data)
	{
		$this->db->where('idConductor', $idConductor);
		$this->db->update('conductor', $data);
	}

	public function listaconductoresdeshabilitados()
	{
		$this->db->select('*'); //select*
		$this->db->from('conductor'); //tabla
		$this->db->where('habilitado', '0');
		return $this->db->get();	//devolucion del resultado de la consulta
	}
}
