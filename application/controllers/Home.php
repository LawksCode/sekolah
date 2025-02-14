<?php

Class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKuota');
        $this->load->model('ModelPendaftaran');
        $this->load->model('ModelJadwal');

    }
    public function index(){
        $data = array(
            "active_home" => "active",
            "title" => "SMPN 148 Jakarta",
            "jadwal_pendaftaran" => $this->ModelJadwal->getBatasJadwal(),
            "tanggal_laptop" => date("Y-m-d")
        );
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/layout/content');
        $this->load->view('home/layout/footer');
    }
    public function pendaftaran(){
        $id_kelas = $this->uri->segment(3);
        $jadwal_pendaftaran = $this->ModelJadwal->getBatasJadwal();
        $jadwal_selesai = $jadwal_pendaftaran['jadwal_selesai'];
        $jadwal_mulai = $jadwal_pendaftaran['jadwal_mulai'];
        $tanggal_laptop = date("Y-m-d");
        if($this->session->userdata('username') == null) {
            $this->session->set_flashdata("pesan", "Silahkan Login Terlebih Dahulu");
            $this->session->set_flashdata("title", "Gagal!!");
            $this->session->set_flashdata("type", "warning");
            redirect(base_url());
        }
        if($jadwal_selesai < $tanggal_laptop) {
            $this->session->set_flashdata("pesan", "Pendaftaran Mutasi Telah Ditutup !!");
            $this->session->set_flashdata("title", "Informasi!!");
            $this->session->set_flashdata("type", "info");
            redirect(base_url('home/kuota_mutasi'));
        }
        if($tanggal_laptop < $jadwal_mulai){
            $this->session->set_flashdata("pesan", "Mohon maaf, Pendaftaran Siswa mutasi belum dimulai !");
            $this->session->set_flashdata("title", "Informasi!!");
            $this->session->set_flashdata("type", "info");
            redirect(base_url('home/kuota_mutasi'));
        }
        $data = array(

            "active_pendaftaran" => "active",
            "title" => "Pendaftaran",
            "data_kelas" => $this->ModelKuota->getDataKelas(),
            "jadwal_pendaftaran" => $this->ModelJadwal->getBatasJadwal(),
            "dipilih" => $this->ModelKuota->getDataKelasById($id_kelas)
        );
       
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/data/pendaftaran');
        $this->load->view('home/layout/footer');
    }
    public function biodata(){

        $data = array(

            "active_biodata" => "active",
            "title" => "Pendaftaran"
        );
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/data/');
        $this->load->view('home/layout/footer');
    }
    public function hasil(){
        $id_user = $this->session->userdata('id_user');
        $data_siswa = $this->ModelPendaftaran->getDataNisById($id_user);
        $nis = $data_siswa['nis'];
        $checkData = $this->ModelJadwal->getDataJadwal($id_user);
        if($checkData != null){

            $dataPendaftaran = $this->ModelPendaftaran->getDataHasilByNis($nis);
        }else{
            $dataPendaftaran = $this->ModelPendaftaran->getDataHasilAndJadwalByNis($nis);

        }
        $data = array(

            "active_hasil" => "active",
            "title" => "Pendaftaran",
            'data_pendaftaran' => $dataPendaftaran,
            // 'jadwal' => $checkData['jadwal'],
            'check_jadwal' => $checkData
            
        );
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/hasil/hasil');
        $this->load->view('home/layout/footer');
    }

    public function visi(){
        $data = array(

            "active_visi" => "active",
            "title" => "Visi/Misi"
        );
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/visi/visi');
        $this->load->view('home/layout/footer');
    }
    public function about_school(){
        $data = array(

            "active_about" => "active",
            "title" => "Tentang Sekolah"
        );
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/about_school/aboutSchool');
        $this->load->view('home/layout/footer'); 
    }
  
   public function kuota_mutasi(){
        $data = array(

            "active_kuota" => "active",
            "title" => "Tentang Sekolah",
            "data_kuota"    => $this->ModelKuota->getDataKuota(),
           
        );
        $this->load->view('home/layout/header',$data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/kuota/v_kuota');
        $this->load->view('home/layout/footer');
    }

}