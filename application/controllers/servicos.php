<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos extends CI_Controller {

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
			$this->load->view('servicos/criar');
			$this->load->view('rodape');


	}

	public function salvar(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->database();
			$this->form_validation->set_rules('data', 'Data', 'required|is_unique[servicos.data]|xss_clean');
			$this->form_validation->set_rules('desc1', 'Descrição', '[servicos.desc1]|xss_clean');
			$this->form_validation->set_rules('desc2', 'Detalhes', '[servicos.desc2]|xss_clean');
			$this->form_validation->set_rules('local', 'Local', '[servicos.local]|xss_clean');
			$this->form_validation->set_rules('departamento', 'Departamento', '[servicos.departamento]|xss_clean');
			$this->form_validation->set_rules('valor', 'valor', '[servicos.valor]|xss_clean');


			$this->load->view('topo', $this->dados);

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('servicos/criar');
			}
			else
			{
				$this->dados = array();
				$this->dados["data"] = $this->input->post("data");
				$this->dados["id_veiculo"] = $this->input->post("id_veiculo");
				$this->dados["desc1"] = $this->input->post("desc1");
				$this->dados["desc2"] = $this->input->post("desc2");
				$this->dados["local"] = $this->input->post("local");
				$this->dados["departamento"] = $this->input->post("departamento");
				$this->dados["valor"] = $this->input->post("valor");

				$this->load->database();
				$this->db->insert('servicos', $this->dados);
				$this->load->view('servicos/sucesso');
		}

		$this->load->view('rodape');
	}

	public function excluir($id){

			$this->load->database();
			$this->load->model("servicos");

			$servicos = $this->db->get_where("servicos", array("id" => $id))->row(0, "Servicos");

			if(!$abastecimento){
				show_404("servicos/excluir");
			}

			$this->dados["servico"] = $servico;
			$this->load->view('topo', $this->dados);
			$this->load->view('servicos/excluir', $this->dados);
			$this->load->view('rodape');
	}

		public function apagar($id){
			$this->load->database();

			$this->db->where("id", $id);
			$this->db->delete("servicos");


			$this->load->view('topo', $this->dados);
			$this->load->view('servicos/apagado');
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
	public function imprimir_servicos(){

				if(empty($_GET["q"])){
					$q = "";
				} else {
					$q = $_GET["q"];
				}

				$this->load->database();
				$this->load->model("servico");

				$this->db->like('data', $q);
				$this->db->or_like('id_veiculo', $q);
				$this->db->or_like('desc1', $q);
				$this->db->or_like('desc2', $q);
				$this->db->or_like('local', $q);
				$this->db->or_like('departamento', $q);
				$this->db->or_like('valor', $q);

				$this->db->order_by("data asc, id_veiculo asc, desc1 asc, desc2 asc, local asc, departamento asc, valor asc");

				$this->dados["servico"] = $this->db->get("servico")->result("servico");
				$this->dados["q"] = $q;
				$this->load->view('topo', $this->dados);
				$this->load->view('servicos/lista_servicos', $this->dados);
				$this->load->view('rodape');
	}

	public function index($pagina = 0)
		{
			$this->load->library('pagination');
			$this->load->database();
			$this->load->model("servico");


			$config['base_url'] = base_url() . 'servicos/index';
			$config['total_rows'] = $this->db->count_all_results("servico");

			$this->pagination->initialize($config);

			$this->dados["paginacao"] = $this->pagination->create_links();

			$this->db->limit(10, $pagina);
			$this->dados["servicos"] = $this->db->get("servico")->result("servico");

			$this->dados["q"] = "";
			$this->dados["modelo"] = "";

			$this->load->view('topo', $this->dados);
			$this->load->view('servicos/lista', $this->dados);
			$this->load->view('rodape');
		}
}