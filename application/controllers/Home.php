<?php
/**
 * Created by PhpStorm.
 * User: saadi
 * Date: 12/9/2017
 * Time: 12:36 AM
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    /*===== DEFAULT HOME PAGE =====*/
    public function index()
    {
        $data['slider_image'] = $this->Admin_model->getAll('slider');
        $data['title'] = "Eshop | Home";
        $this->load->view('frontend/static/head',$data);
        $this->load->view('frontend/static/header');
        $this->load->view('frontend/static/nav_menu');
        $this->load->view('frontend/static/slider');
        $this->load->view('frontend/home');
        $this->load->view('frontend/static/footer');
    }
}