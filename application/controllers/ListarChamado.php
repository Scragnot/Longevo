<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListarChamado extends CI_Controller {

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
	public function index($pagina = 1)
	{
		$this->load->model('Chamado_model');
		$data['filtroEmail'] = $this->input->post('filtroEmail');
		$data['filtroPedido'] = $this->input->post('filtroPedido');
		$data['chamados'] = $this->Chamado_model->lista($pagina, $data);
		$data['total'] = $this->Chamado_model->total($data);
		$data['pagina'] = $pagina;

		$this->load->view('head');
		$this->load->view('listarChamado', $data);
		$this->load->view('footer');
	}
}