<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Middleware extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mMiddleware');
    }

    public function index()
    {
       $this->mMiddleware->StartMiddleware(); 
    }
}
