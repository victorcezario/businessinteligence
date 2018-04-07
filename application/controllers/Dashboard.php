<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
    }
    public function index(){
    }
    public function Visualizar(){

        $dados_dashboard = $this->mDashboard->DadosDashboard($this->uri->segment(3));
        $dados['id'] = $dados_dashboard['ID'];
        if($this->uri->segment(4) != NULL){
            $dados['filtro_padrao'] = $this->uri->segment(4);
        }else{
            $dados['filtro_padrao'] = $dados_dashboard['PADRAO'];
        }
        if($this->uri->segment(5) != NULL){
            $dados['empresa'] = $this->uri->segment(5);
        }else{
            $dados['empresa'] = $dados_dashboard['EMPRESA'];
        }

        $dados['lista_kpi'] = $this->mDashboard->ListarKPI($this->uri->segment(3),$dados['filtro_padrao'],$dados['empresa']);
        $dados['script_charts'] = $this->mDashboard->ListarScriptChart($dados['id'],$dados['filtro_padrao'],$dados['empresa']);
        $dados['charts'] = $this->mDashboard->ListarCharts($dados['id'],$dados['filtro_padrao'],$dados['empresa']);
        $this->load->template('Dashboard/view_Index', $dados);
    }
}
