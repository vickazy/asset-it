<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class departemen extends CI_Controller {

  function __construct(){
    parent:: __construct();
    $this->load->model('m_departemen','m'); //load model, simpan ke m
  //$this->load->model('m_fungsi','mf');
  }


	function index(){
    $data['d_departemen']  = $this->m->ambilData(); //jalankan fungsi ambilData, simpan ke $data

    $this->load->view('header');
		$this->load->view('leftside');
		$this->load->view('departemen/index', $data); //load index kategori, bypass $data
		$this->load->view('footer');
	}


  function tambah(){
    $data['d_departemen']  = $this->m->ambilData(); //jalankan fungsi ambilDataTipe, simpan ke $data

    $this->load->view('header');
    $this->load->view('leftside');
    $this->load->view('departemen/tambah', $data);
    $this->load->view('footer');
  }

  function submit(){
    $hasil = $this->m->submit();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah tersimpan');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menambah data ');
    }
    redirect(base_url('departemen/index'));
  }

  function ubah ($id){
    $data['d_departemen']  = $this->m->ambilDataID($id); //jalankan fungsi ambilData berdasarkan ID, simpan ke $data

    $this->load->view('header');
    $this->load->view('leftside');
    $this->load->view('departemen/ubah', $data);
    $this->load->view('footer');

  }

  public function update(){
    $hasil = $this->m->update();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
      helper_log("ubah", "mengubah data");
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('departemen/index'));
  }

  function hapus($id){
    $hasil = $this->m->hapus($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dihapus');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menghapus data ');
    }
    redirect(base_url('departemen/index'));
  }

}
