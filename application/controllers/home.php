<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->load->helper("autentica");
		$this->dados["usuario"] = verifica_sessao();
	}

	public function index($pagina = 0)
		{
			$this->load->library('pagination');
			$this->load->database();
			$this->load->model("home");


			$config['base_url'] = base_url() . 'home/index';
			$config['total_rows'] = $this->db->count_all_results("home");

			$this->pagination->initialize($config);

			$this->dados["paginacao"] = $this->pagination->create_links();

			$this->db->limit(10, $pagina);
			$this->dados["home"] = $this->db->get("home")->result("home");

			$this->dados["q"] = "";
			$this->dados["modelo"] = "";

			$this->load->view('topo', $this->dados);
			$this->load->view('home/lista', $this->dados);
			$this->load->view('rodape');
		}
}