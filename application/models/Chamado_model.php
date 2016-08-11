<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chamado_model extends CI_Model {

	public function lista($pagina = 1, $filtro)
	{
		$this->db->select('chamado.id_chamado, chamado.titulo, chamado.observacao, cliente.nome as cliente, pedido.nome as pedido');    
		$this->db->from('chamado');
		$this->db->join('pedido', 'chamado.id_pedido = pedido.id_pedido');
		$this->db->join('cliente', 'chamado.id_cliente = cliente.id_cliente');
		if($filtro['filtroEmail'] != ''){
			$this->db->like('cliente.email', $filtro['filtroEmail']);
		}
		if($filtro['filtroPedido'] != ''){
			$this->db->where('chamado.id_pedido', $filtro['filtroPedido']);
		}
		$this->db->limit(5, (($pagina-1)*5));
		return $this->db->get();
	}
	public function total($filtro)
	{
		$this->db->select('id_chamado');
		$this->db->from('chamado');
		$this->db->join('pedido', 'chamado.id_pedido = pedido.id_pedido');
		$this->db->join('cliente', 'chamado.id_cliente = cliente.id_cliente');
		if($filtro['filtroEmail'] != ''){
			$this->db->like('cliente.email', $filtro['filtroEmail']);
		}
		if($filtro['filtroPedido'] != ''){
			$this->db->where('chamado.id_pedido', $filtro['filtroPedido']);
		}
		return $this->db->count_all_results();
	}
	public function inserir($chamado)
	{
		$data = array(
		   'id_cliente' => $chamado['id_cliente'],
		   'id_pedido' => $chamado['id_pedido'],
		   'titulo' => $chamado['titulo'],
		   'observacao' => $chamado['observacao']
		);
		$this->db->insert('chamado', $data); 

		return true;
	}
}