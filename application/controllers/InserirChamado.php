<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InserirChamado extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('head');
		$this->load->view('inserirChamado');
		$this->load->view('footer');
	}

	public function inserir()
	{
		
		$this->load->model('Chamado_model');
		$this->load->model('Cliente_model');
		$this->load->model('Pedido_model');

		$cliente['nome'] = $this->input->post('cliente');
		$cliente['email'] = $this->input->post('email');
		$chamado['id_pedido'] = $this->input->post('pedido');
		$chamado['titulo'] = $this->input->post('titulo');
		$chamado['observacao'] = $this->input->post('observacao');
		$retorno = array();

		$retorno['erroPedido'] = 0;
		if(!$this->Pedido_model->validaPedido($chamado['id_pedido'])){
			$retorno['erroPedido'] = 1;
		}

		$retorno['sucesso'] = 0;
		if($retorno['erroPedido'] == 0){
			$chamado['id_cliente'] = $this->Cliente_model->localizaCliente($cliente);
			
			$this->Chamado_model->inserir($chamado);
			$retorno['sucesso'] = 1;
		}

		echo json_encode($retorno);
	}
}