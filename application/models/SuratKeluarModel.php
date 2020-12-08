<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluarModel extends CI_Model
{

    // get all surat keluar data
    public function getAllSuratKeluar($id = null)
    {
        $this->db->select('surat_keluar.*, instansi.nama_instansi as nama_instansi, status_surat.status as status');
        $this->db->from('surat_keluar');
        $this->db->join('instansi', 'instansi.id_instansi = surat_keluar.id_instansi');
        $this->db->join('status_surat', 'status_surat.id_status_surat = surat_keluar.id_status_surat');

        if ($id != null) {
            $this->db->where('id_surat_keluar', $id);
        }

        $query = $this->db->get();
        return $query;
    }


    // add surat keluar data
    public function addSuratKeluar($file)
    {
        $data = [
            "no_surat"              => $this->input->post('no_surat', true),
            "id_instansi"           => $this->input->post('id_instansi', true),
            "id_status_surat"       => $this->input->post('id_status_surat', true),
            "isi"                   => $this->input->post('isi', true),
            "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            "keterangan"            => $this->input->post('keterangan', true),
            "file_surat"            => $file
        ];

        $this->db->insert('surat_keluar', $data);
    }


    // get data by id
    public function getByIdSuratKeluar($id_surat_keluar)
    {
        return $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id_surat_keluar])->row_array();
    }


    // detail surat keluar by id
    public function detailSuratKeluar($id)
    {
        $result = $this->db->where('id_surat_keluar', $id)->get('surat_keluar');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    // edit data by id
    public function editSuratKeluar($file)
    {
        $data = [
            "no_surat"              => $this->input->post('no_surat', true),
            "id_instansi"           => $this->input->post('id_instansi', true),
            "id_status_surat"       => $this->input->post('id_status_surat', true),
            "isi"                   => $this->input->post('isi', true),
            "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            "keterangan"            => $this->input->post('keterangan', true),
            "file_surat"            => $file
        ];

        $this->db->where('id_surat_keluar', $this->input->post('id_surat_keluar'));
        $this->db->update('surat_keluar', $data);
    }


    // count surat keluar data
    public function getCountDataSuratKeluar()
    {
        return $this->db->query("select * from surat_keluar");
    }


    // delete surat keluar data by id
    public function deleteSuratKeluar($id)
    {
        $this->db->where('id_surat_keluar', $id);
        $this->db->delete('surat_keluar');
    }
}
