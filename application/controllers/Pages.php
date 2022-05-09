<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    public function home(){
        $this->load->view('templates/header');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');

    }
    public function about(){
        $this->load->view('templates/header');
        $this->load->view('pages/about');
        $this->load->view('templates/footer');

    }
}
