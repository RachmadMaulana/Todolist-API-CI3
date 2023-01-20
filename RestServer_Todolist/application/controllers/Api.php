<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_todolist','list');
    }

    public function index_get()
    {

        $user_id = $this->get('user_id');

        if($user_id == null){
            $list = $this->list->getKegiatan();
        }else {
            $list = $this->list->getKegiatan($user_id);
        }

        if($list){
            $this->response( [
                'status' => true,
                'data' => $list,
            ], 200 );
        }else{
            $this->response( [
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404 );
        }
    }

    public function index_delete(){
        $user_id = $this->delete('user_id');
        $id = $this->delete('id_kegiatan');

        if($user_id == null){
            $this->response( [
                'status' => false,
                'message' => 'user_id tidak boleh kosong',
            ], 400 );
        }else{
            if($id == null){
                $this->response( [
                    'status' => false,
                    'message' => 'id_kegiatan tidak boleh kosong',
                ], 400 );
            }else{
                if($this->list->deleteKegiatan($user_id,$id) > 0){
                    $this->response( [
                        'status' => true,
                        'message' => 'berhasil hapus data',
                    ], 200 );
                }else{
                    $this->response( [
                        'status' => true,
                        'message' => 'gagal hapus data',
                    ], 405 );
                }
            }
        }
    }

    public function index_post(){

        $data = [
            'user_id' => $this->post('user_id'),
            'kegiatan' => $this->post('kegiatan'),
            'status_id' => 2
        ];

        if($this->list->tambahKegiatan($data) > 0){
            $this->response( [
                'status' => true,
                'message' => 'Berhasil menambahkan data',
            ], 201 );
        }else{
            $this->response( [
                'status' => false,
                'message' => 'Gagal menambahkan data',
            ], 400 );
        }
    }

    public function index_put(){
        $id = $this->put('id');
        $data = [
            'user_id' => $this->put('user_id'),
            'kegiatan' => $this->put('kegiatan'),
            'status_id' => $this->put('status_id')
        ];

        if($this->list->editKegiatan($data,$id) > 0){
            $this->response( [
                'status' => true,
                'message' => 'Berhasil edit data',
            ], 201 );
        }else{
            $this->response( [
                'status' => false,
                'message' => 'Gagal edit data',
            ], 405 );
        }
    }
}
