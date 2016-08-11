<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model {

	public function validaPedido($id_pedido)
	{
		$this->db->select('id_pedido');
		$this->db->from('pedido');
		$this->db->where('id_pedido', $id_pedido);
		return $this->db->count_all_results();
	}
}