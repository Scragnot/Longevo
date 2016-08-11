<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	public function localizaCliente($cliente)
	{
		$this->db->select('id_cliente');
		$this->db->from('cliente');
		$this->db->where('email', $cliente['email']);
		$rs = $this->db->get();
		if(count($rs->result()) == 0){
			$id_cliente = $this->insereCliente($cliente);
		}
		else{
			$this->atualizaCliente($cliente);	
			$id_cliente = $rs->result()[0]->id_cliente;
		}

		return $id_cliente;
	}

	private function insereCliente($cliente)
	{
		$data = array(
		   'nome' => $cliente['nome'],
		   'email' => $cliente['email']
		);
		$this->db->insert('cliente', $data); 

		return $this->db->insert_id();
	}

	private function atualizaCliente($cliente)
	{
		$data = array(
               'nome' => $cliente['nome']
            );

		$this->db->where('email', $cliente['email']);
		$this->db->update('cliente', $data); 

		return true;
	}
}