<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abastecimentos extends CI_Controller {

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->load->helper("autentica");
		$this->dados["usuario"] = verifica_sessao();
	}


	public function criar()
		{
				$this->load->model("veiculo");
				$this->load->model("setor");
		$this->load->database();

				$this->load->view('topo', $this->dados);


//Veiculos
		$this->db->order_by("modelo", "asc");
		$this->dados["veiculos"] = $this->db->get("veiculo")->result("Veiculo");

			$this->load->view('topo', $this->dados);
			$this->load->view('abastecimentos/criar');
			$this->load->view('rodape');


	}

	public function salvar(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->database();
			$this->form_validation->set_rules('data', 'Data', 'required|is_unique[abastecimento.data]|xss_clean');
			$this->form_validation->set_rules('combustivel', 'Combustivel', '[abastecimento.combustivel]|xss_clean');
			$this->form_validation->set_rules('quantidade', 'Quantidade', '[abastecimento.quantidade]|xss_clean');
			$this->form_validation->set_rules('unidade', 'unidade', '[abastecimento.unidade]|xss_clean');
			$this->form_validation->set_rules('preco_unitario', 'Preço Unitário', '[abastecimento.preco_unitario]|xss_clean');
			$this->form_validation->set_rules('total', 'Total', '[abastecimento.total]|xss_clean');


			$this->load->view('topo', $this->dados);

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('abastecimentos/criar');
			}
			else
			{
				$this->dados = array();
				$this->dados["data"] = $this->input->post("data");
				$this->dados["id_veiculo"] = $this->input->post("id_veiculo");
				$this->dados["combustivel"] = $this->input->post("combustivel");
				$this->dados["quantidade"] = $this->input->post("quantidade");
				$this->dados["unidade"] = $this->input->post("unidade");
				$this->dados["preco_unitario"] = $this->input->post("preco_unitario");
				$this->dados["total"] = $this->input->post("total");

				$this->load->database();
				$this->db->insert('abastecimento', $this->dados);
				$this->load->view('abastecimentos/sucesso');
		}

		$this->load->view('rodape');
	}

	public function excluir($id){

			$this->load->database();
			$this->load->model("abastecimento");

			$abastecimento = $this->db->get_where("abastecimento", array("id" => $id))->row(0, "Abastecimento");

			if(!$abastecimento){
				show_404("abastecimentos/excluir");
			}

			$this->dados["abastecimento"] = $abastecimento;
			$this->load->view('topo', $this->dados);
			$this->load->view('abastecimentos/excluir', $this->dados);
			$this->load->view('rodape');
	}

		public function apagar($id){
			$this->load->database();

			$this->db->where("id", $id);
			$this->db->delete("abastecimento");


			$this->load->view('topo', $this->dados);
			$this->load->view('abastecimentos/apagado');
			$this->load->view('rodape');
	}

	public function resultado_busca(){
			$q = $_GET["q"];

			if($q == "" || $q == null){
				redirect("abastecimentos");
			}


			if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
				$pagina = $_GET["pagina"];
			} else {
				$pagina = 0;
			}

			$this->load->library('pagination');
			$this->load->database();
			$this->load->model("abastecimento");

			$this->db->like('placa', $q);
			$this->db->or_like('marca', $q);
			$this->db->or_like('modelo', $q);
			$this->db->or_like('ano', $q);

			$config['base_url'] = base_url('abastecimentos');
			$config['total_rows'] = $this->db->count_all_results("abastecimento");
			$this->pagination->initialize($config);

			$this->dados["paginacao"] = $this->pagination->create_links();

			$this->db->like('placa', $q);
			$this->db->or_like('marca', $q);
			$this->db->or_like('modelo', $q);
			$this->db->or_like('ano', $q);
			$this->db->limit(10, $pagina * 10);

			$this->dados["abastecimentos"] = $this->db->get("abastecimento")->result("abastecimento");
			$this->dados["q"] = $q;
			$this->load->view('topo', $this->dados);
			$this->load->view('abastecimentos/lista', $this->dados);
			$this->load->view('rodape');

	}

	public function imprimir_abastecimentos(){

				if(empty($_GET["q"])){
					$q = "";
				} else {
					$q = $_GET["q"];
				}

				$this->load->database();
				$this->load->model("abastecimento");

				$this->db->like('data', $q);
				$this->db->or_like('id_veiculo', $q);
				$this->db->or_like('combustivel', $q);
				$this->db->or_like('quantidade', $q);
				$this->db->or_like('unidade', $q);
				$this->db->or_like('preco_unitario', $q);
				$this->db->or_like('total', $q);

				$this->db->order_by("data asc, id_veiculo asc, combustivel asc, quantidade asc, unidade asc, preco_unitario asc, total asc");

				$this->dados["abastecimento"] = $this->db->get("abastecimento")->result("abastecimento");
				$this->dados["q"] = $q;
				$this->load->view('topo', $this->dados);
				$this->load->view('abastecimentos/lista_abastecimentos', $this->dados);
				$this->load->view('rodape');
		}


	public function index($pagina = 0)
	{
		$this->load->library('pagination');
		$this->load->database();
		$this->load->model("abastecimento");


		$config['base_url'] = base_url() . 'abastecimentos/index';
		$config['total_rows'] = $this->db->count_all_results("abastecimento");

		$this->pagination->initialize($config);

		$this->dados["paginacao"] = $this->pagination->create_links();

		$this->db->limit(10, $pagina);
		$this->dados["abastecimentos"] = $this->db->get("abastecimento")->result("abastecimento");

		$this->dados["q"] = "";
		$this->dados["modelo"] = "";

		$this->load->view('topo', $this->dados);
		$this->load->view('abastecimentos/lista', $this->dados);
		$this->load->view('rodape');
		$this->load->view('abastecimentos/javascript');
	}

}