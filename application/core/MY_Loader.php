<?php
class MY_Loader extends CI_Loader {
    public function index(){

    }
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        //Carrega Views
        if($return):
            $content  = $this->view('Templates/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('Templates/footer', $vars, $return);
            return $content;
        else:
            $this->view('Templates/header', $vars);
            $this->view($template_name, $vars);
            $this->view('Templates/footer', $vars);
        endif;
        //Autentica Usuario
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url().'auth/login');
        }
    }
}