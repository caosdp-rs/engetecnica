<?php 

class Ativo_veiculo_model extends MY_Model {

	public function salvar_formulario($data=null){

		if($data['id_ativo_veiculo']==''){
			$this->db->insert('ativo_veiculo', $data);
			return "salvar_ok";
		} else {
			$this->db->where('id_ativo_veiculo', $data['id_ativo_veiculo']);
			$this->db->update('ativo_veiculo', $data);
			return "salvar_ok";
		}

	}

	public function ativos(){
		return $this->db->from('ativo_veiculo')
								->order_by('data', 'desc')
								->group_by('id_ativo_veiculo');
	}

	public function search_ativos($search){
		return $this->ativos()
			->group_by('id_ativo_veiculo')
			->order_by('id_ativo_veiculo', 'desc')
			->like('veiculo', $search)
			->or_like('veiculo_placa', $search)
			->or_like('codigo_fipe', $search)
			->or_like('id_ativo_veiculo', $search)
			->or_like('data', $search)
			->get()->result();
	}

	public function get_categoria_lista(){
		return $this->ativos()
				->where('id_ativo_veiculo_vinculo', 0)
				->get()->result();
	}

	public function get_lista(){
		return $this->ativos()->get()->result();
	}

	public function get_ativo_veiculo($id_ativo_veiculo=null){
		return $this->ativos()
					->where('id_ativo_veiculo', $id_ativo_veiculo)
					->get()->row();
	}

	public function ativo_veiculo_manutencao(){
			return 	$this->db
			->from('ativo_veiculo_manutencao mnt')
			->select('mnt.*, atv.veiculo, atv.veiculo_placa')
			->select('frn.razao_social as fornecedor')
			->select('ativo_configuracao.titulo as servico')
			->join("ativo_veiculo atv", "atv.id_ativo_veiculo=mnt.id_ativo_veiculo")
			->join("fornecedor frn", "frn.id_fornecedor=mnt.id_fornecedor")
			->join('ativo_configuracao', 'ativo_configuracao.id_ativo_configuracao=mnt.id_ativo_configuracao')
			->order_by('mnt.id_ativo_veiculo_manutencao', 'desc');
	}

	public function get_ativo_veiculo_manutencao_lista($id_ativo_veiculo = null, $em_andamento = null){
		$manutencoes = $this->ativo_veiculo_manutencao();

		if ($id_ativo_veiculo) {
			$manutencoes->where("mnt.id_ativo_veiculo", $id_ativo_veiculo);
		}
		
		if ($em_andamento != null) {
			if ($em_andamento) {
				$manutencoes->where("mnt.data_saida IS NULL");
			} else {
				$manutencoes->where("mnt.data_saida NO IS NULL");
			}
		}

		return $manutencoes->group_by('id_ativo_veiculo_manutencao')
												->get('ativo_veiculo_manutencao')
												->result();
	}

	public function count_ativo_veiculo_em_manutencao(){
		return $this->ativo_veiculo_manutencao()
				->group_by('id_ativo_veiculo')
				->get()->num_rows();
	}

	public function get_ativo_veiculo_km_lista($id_ativo_veiculo){
		$this->db->select('ativo_veiculo_quilometragem.*, ativo_veiculo.veiculo, ativo_veiculo.veiculo_placa')
				->join("ativo_veiculo", "ativo_veiculo.id_ativo_veiculo=ativo_veiculo_quilometragem.id_ativo_veiculo")
				->where("ativo_veiculo_quilometragem.id_ativo_veiculo", $id_ativo_veiculo)
				->order_by('ativo_veiculo_quilometragem.id_ativo_veiculo_quilometragem', 'desc');
		return $this->db
				->group_by('id_ativo_veiculo_quilometragem')
				->get('ativo_veiculo_quilometragem')
				->result();
	}


	public function get_ativo_veiculo_ipva_lista($id_ativo_veiculo){
		$this->db->select('ativo_veiculo_ipva.*, ativo_veiculo.veiculo, ativo_veiculo.veiculo_placa')
				->join("ativo_veiculo", "ativo_veiculo.id_ativo_veiculo=ativo_veiculo_ipva.id_ativo_veiculo")
				->where("ativo_veiculo_ipva.id_ativo_veiculo", $id_ativo_veiculo)
				->order_by('ativo_veiculo_ipva.id_ativo_veiculo_ipva', 'desc');
		return $this->db
				->group_by('id_ativo_veiculo_ipva')
				->get('ativo_veiculo_ipva')
				->result();
	}
	
	public function get_ativo_veiculo_seguro_lista($id_ativo_veiculo){
		$this->db->select('ativo_veiculo_seguro.*, ativo_veiculo.veiculo, ativo_veiculo.veiculo_placa')
				->join("ativo_veiculo", "ativo_veiculo.id_ativo_veiculo=ativo_veiculo_seguro.id_ativo_veiculo")
				->where("ativo_veiculo_seguro.id_ativo_veiculo", $id_ativo_veiculo)	
				->order_by('ativo_veiculo_seguro.id_ativo_veiculo_seguro', 'desc');
		return $this->db
				->group_by('id_ativo_veiculo_seguro')
				->get('ativo_veiculo_seguro')
				->result();
	}	

	public function get_tipo_servico($id_ativo_configuracao=null){
		$this->db
				->where("(id_ativo_configuracao_vinculo={$id_ativo_configuracao})")
				->where("situacao = '0'");

		return $this->db->group_by('id_ativo_configuracao')
										->get('ativo_configuracao')
										->result();
	}	

	public function get_fornecedor(){
		$this->db->order_by("razao_social", "asc")->where("situacao = '0'");;
		return $this->db->group_by('id_fornecedor')->get('fornecedor')->result();
	}

	public function get_ativo_veiculo_depreciacao_lista($id_ativo_veiculo){
		$this->db->where('id_ativo_veiculo', $id_ativo_veiculo);
		return $this->db->group_by('id_ativo_veiculo_depreciacao')
							->get('ativo_veiculo_depreciacao')
							->result();
	}

	# Gerenciamento de veículos
	# Função de Base
	public function get_ativo_veiculo_detalhes($id_ativo_veiculo){
		$this->db->where("id_ativo_veiculo", $id_ativo_veiculo);
		return $this->db->get('ativo_veiculo')->row();
	}


}