<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Todolist extends MY_Controller
{

    public function index()
    {

        if ($this->session->userdata('is_login')) {
            $data['judul'] = 'Dasboard';
            $data['page'] = 'dashboard/v_dashboard';
            $id = $this->session->userdata('user_id');
            $data['kegiatan'] = $this->list->tampilKegiatan($id);;
            $data['kegiatanSelesai'] = $this->list->tampilKegiatanSelesai($id);
            $this->view($data);
        } else {
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }


    public function add()
    {
        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'user_id' => $this->session->userdata('user_id'),
            'status_id' => 2
        ];
        $row = $this->list->addKegiatan($data);
        if ($row > 0) {
            $this->session->set_flashdata('success', 'Berhasil Menambahkan kegiatan');
            redirect('todolist');
        }
    }

    public function edit()
    {
        $input = (object) $this->input->post(null, true);
        $user_id = $this->session->userdata('user_id');

        $row = $this->list->editKegiatan($input, $user_id);
        if ($row > 0) {
            $this->session->set_flashdata('success', 'Berhasil Edit Kegiatan');
            redirect('todolist');
        }
    }

    public function delete($id)
    {
        $row = $this->list->delete($id);
        if ($row > 0) {
            $this->session->set_flashdata('success', 'Berhasil Hapus Kegiatan');
            redirect('todolist');
        }
    }

    public function selesai($id)
    {
        $row = $this->list->selesai($id);
        if ($row > 0) {
            $this->session->set_flashdata('success', 'Berhasil Menyelesaikan Kegiatan');
            redirect('todolist');
        }
    }
}
