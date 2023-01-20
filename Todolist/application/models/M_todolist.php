<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_todolist extends MY_Model
{
    public function addKegiatan($data)
    {
        $this->db->insert('kegiatan', $data);
        return $this->db->affected_rows();
    }

    public function tampilKegiatan($id)
    {
        $this->db->select('id,kegiatan');
        $this->db->from('kegiatan');
        $this->db->where('kegiatan.user_id', $id);
        $this->db->where('kegiatan.status_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function editKegiatan($input, $user_id)
    {
        $data = [
            'kegiatan' => $input->kegiatan
        ];
        $this->db->where('id', $input->idKegiatan);
        $this->db->where('user_id', $user_id);
        $this->db->update('kegiatan', $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
        return $this->db->affected_rows();
    }

    public function selesai($id)
    {
        $data = [
            'status_id' => 1
        ];

        $this->db->where('id', $id);
        $this->db->update('kegiatan', $data);
        return $this->db->affected_rows();
    }

    public function tampilKegiatanSelesai($id)
    {
        $this->db->select('id,kegiatan');
        $this->db->from('kegiatan');
        $this->db->where('kegiatan.user_id', $id);
        $this->db->where('kegiatan.status_id', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
