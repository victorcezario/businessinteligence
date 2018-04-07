<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manutencao extends CI_Controller {

    function __Construct(){
        parent::__Construct();
        $this->load->library('grocery_CRUD');
    }
    public function exibir_crud($output = null)
    {
        $this->load->template('Manutencao/view_Crud',(array)$output);
    }
    public function index(){
            $crud = new grocery_CRUD();
            $crud->set_language("pt-br.portuguese");
            //$crud->set_theme('datatables'); 
            $crud->set_table('BI_MODULOS_CAMPOS');
            $crud->set_relation('ID_MODULO','BI_MODULOS','ID');
            $crud->columns('ID_MODULO','NOME','APELIDO','TIPO','TAMANHO','STATUS');
            $crud->field_type('STATUS', 'true_false', array('Inativo', 'Ativo'));
            $output = $crud->render();
            $this->exibir_crud($output);
    }
}