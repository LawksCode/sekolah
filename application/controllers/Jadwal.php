<?php

Class Jadwal extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelJadwal');
        $this->load->model('ModelSiswa');
        $this->load->model('ModelPendaftaran');
    }

    public function add_jadwal()
    {
        $id_user = $this->input->post('id_user');
        $jadwal = $this->input->post('jadwal');
        $jam = $this->input->post('jam');

        
        if($jadwal != null && $id_user != null){
            $getDataUser = $this->ModelSiswa->getDataUserById($id_user);
            $nisn = $getDataUser['nis'];
            $getDataPendaftaran = $this->ModelPendaftaran->getDataHasilByNis($nisn);

            $data = array(
                'jadwal'  => $jadwal,
                'id_user'  => $id_user,
                'jam'   => $jam
            );
            $this->ModelJadwal->addData($data);

            $update = array(
                'pemberitahuan' => 'Jadwal tes tertulis telah keluar, silahkan datangi sekolah pada jadwal yang ditentukan.',
                'status_pemberitahuan' => 2
            );
            $this->ModelPendaftaran->updateData($update,$nisn);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Berhasil Mengupdate Jadwal Siswa');
            $this->session->set_flashdata('title', 'Berhasil!');
            redirect(base_url('dashboard/data_jadwal'));
        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', ' Jadwal Tidak Boleh Kosong!');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/data_jadwal'));
        }
        
        
    }
    public function aturjadwal(){
        $jadwal_mulai = $this->input->post('jadwal_mulai');
        $jadwal_selesai = $this->input->post('jadwal_selesai');

        if($jadwal_mulai != null && $jadwal_selesai != null){
        $get_dataJadwalPendaftaran = $this->ModelPendaftaran->getDataJadwalPendaftaran();
        $id_jadwal_pendaftaran = $get_dataJadwalPendaftaran['id_jadwal_pendaftaran'];
        if($get_dataJadwalPendaftaran != null) {
            $data_update = array(
                'jadwal_mulai' => $jadwal_mulai,
                'jadwal_selesai' => $jadwal_selesai,
                'status' => 1,
            );
            $this->ModelJadwal->updateDataJadwalPendaftaran($data_update, $id_jadwal_pendaftaran);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Jadwal Pendaftaran Berhasil Diubah');
            $this->session->set_flashdata('title', 'Berhasil!');
            redirect(base_url('dashboard'));
    }else{
    
        $data = array(
            'jadwal_mulai' => $jadwal_mulai,
            'jadwal_selesai' => $jadwal_selesai,
            'status' => 1,

        );
        $this->ModelJadwal->addDataJadwalPendaftaran($data);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Jadwal Pendaftaran Berhasil Ditambahkan');
        $this->session->set_flashdata('title', 'Berhasil!');
        redirect(base_url('dashboard'));
    }
    }else{
        $this->session->set_flashdata('type', 'warning');
        $this->session->set_flashdata('pesan', ' Jadwal Pendaftaran Tidak Boleh Kosong!');
        $this->session->set_flashdata('title', 'Gagal!');
        redirect(base_url('dashboard'));
    }
    
}
}