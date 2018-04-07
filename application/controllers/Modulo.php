<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mModulo');
    }
    public function visualizar()
    {
        //$this->MMiddleware->StartMiddleware();
        $dados_modulo = $this->mModulo->DadosModulo($this->uri->segment(3));
        if($dados_modulo == FALSE){
            echo 'Modulo Invalido !';
        }else{
            $dados['tabela'] = '';
            $dados['limited'] = '';
            $dados['modulo_nome'] = $dados_modulo['NOME'];
            $dados['modulo_id'] = $dados_modulo['ID'];
            $dados['dados'] = $this->mModulo->ListarOptionDados($dados_modulo['ID']);
            $dados['valores'] = $this->mModulo->ListarOptionValores($dados_modulo['ID']);
            $dados['filtros'] = $this->mModulo->ListarOptionFiltros($dados_modulo['ID']);
            $dados['url_excel'] = base_url().'modulo/excel/'.$dados['modulo_id'].'/?d=';
            $dados['url_excel'] = $dados['url_excel'].$this->input->get('d').'&v='.$this->input->get('v').'&f='.$this->input->get('f');
            if($this->input->get('d') != NULL){
                $tabela_info =  $this->mModulo->MontaTabela($dados_modulo['TABELA'],$dados_modulo['ID'],$dados['url_excel']);
                $dados['tabela'] = $this->mModulo->ListarTabela($dados_modulo['TABELA'],$dados_modulo['ID'],$dados['url_excel']);
                $dados['limited'] = $tabela_info['limited'];
            }
            $dados['modelos_kpi'] = $this->mModulo->ListarOptionModelosKPI();
            $dados['listar_filtros'] = $this->mModulo->ListarFiltrosAplicados($dados['modulo_id'],$this->input->get('f'));
            $dados['listar_datas'] = $this->mModulo->ListarOptionCamposData($dados_modulo['ID']);
            $dados['listar_dashboards'] = $this->mModulo->ListarOptionDashboards($dados_modulo['ID']);
            $this->load->template('Modulo/view_Index', $dados);
        }

    }
    public function post(){
        if($this->input->post('tipo') == 'remover'){
            $this->mModulo->RemoveFiltro();
        }elseif($this->input->post('tipo') == 'buscadados'){
            $this->mModulo->AtualizarFiltros($this->input->post('modulo_id'));
        }elseif($this->input->post('tipo') == 'gerarkpi'){
            $this->mModulo->CriarKPI(); 
        }
    }
    public function BuscaSubFiltro(){
        echo $this->mModulo->BuscaSubFiltro($this->uri->segment(3));
    }
    public function excel(){
      $dados_modulo = $this->mModulo->DadosModulo($this->uri->segment(3));
        if($dados_modulo == FALSE){
            echo 'Modulo Invalido !';
        }else{
            $dados['modulo_nome'] = $dados_modulo['NOME'];
            $dados['tabela'] = $this->mModulo->ListarTabela($dados_modulo['TABELA'],$dados_modulo['ID'],null,true);
            $this->load->view('Modulo/view_ExcelExport', $dados);
        }

      
    }
}
