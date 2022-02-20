<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function tentang()
	{
		$data['menu'] = "Tentang Pengembang";
		$this->templateadmin->load('template/dashboard','page/tentang',$data);
	}

	public function petunjuk()
	{
		$data['menu'] = "Petunjuk";
		$this->templateadmin->load('template/dashboard','page/petunjuk',$data);
	}

	public function pembuat()
	{
		$data['menu'] = "Biodata Pembuat";
		$this->templateadmin->load('template/dashboard','page/pembuat',$data);
	}


	public function pancanirbhaya()
	{
		$data['menu'] = "Panca Nirbhaya";
		$this->templateadmin->load('template/dashboard','page/pancanirbhaya',$data);
	}

	public function edukasafe()
	{
		$data['menu'] = "Edukasafe";
		$this->templateadmin->load('template/dashboard','page/edukasafe',$data);
	}

	public function hazardreport()
	{
		$data['menu'] = "Hazard Report (SAP)";
		$this->templateadmin->load('template/dashboard','page/hazardreport',$data);
	}

	public function embed()
	{
		$kode = $this->uri->segment(3);
		$dataEmbed = $this->fungsi->pilihan_advanced("tb_embed","kode",$kode)->row();
		if ($dataEmbed == null) {
			$this->session->set_flashdata('warning', 'Data tidak ditemukan');
			redirect('dashboard');
		}
		$data['menu'] = $dataEmbed->deskripsi;
		$data['link'] = $dataEmbed->link;
		$this->templateadmin->load('template/dashboard','page/embed',$data);
	}
}
