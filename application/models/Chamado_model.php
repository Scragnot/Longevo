<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chamado_model extends CI_Model {

	public function lista()
	{

		$this->db->select('chamado.id_chamado, chamado.titulo, chamado.observacao, cliente.nome as cliente, pedido.nome as pedido');    
		$this->db->from('chamado');
		$this->db->join('pedido', 'chamado.id_pedido = pedido.id_pedido');
		$this->db->join('cliente', 'chamado.id_cliente = cliente.id_cliente');
		return $this->db->get();
	}
}