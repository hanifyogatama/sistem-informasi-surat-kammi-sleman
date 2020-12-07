<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluarModel extends CI_Model
{

    // get all surat keluar data
    public function getAllSuratKeluar()
    {
        $query = "SELECT * FROM surat_keluar ORDER BY id_surat_keluar DESC";
        return $this->db->query($query)->result_array();
    }

    public function addSuratKeluar($file)
    {
        $data = [
            // "no_surat"              => $this->input->post('no_surat', true),
            // "id_instansi"           => $this->input->post('id_instansi', true),
            // "id_status_surat"       => $this->input->post('id_status_surat', true),
            // "isi"                   => $this->input->post('isi', true),
            // "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            // "tanggal_diterima"      => $this->input->post('tanggal_diterima', true),
            // "keterangan"            => $this->input->post('keterangan', true),
            "file_surat"            => $file
        ];

        $this->db->insert('surat_keluar', $data);
    }

    // get data surat keluar by id
    public function getByIdSuratKeluar($id)
    {
        return $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row_array();
    }

    // edit data surat keluar by id
    public function editSuratKeluar($file)
    {
        $data = [
            // "no_surat"              => $this->input->post('no_surat', true),
            // "id_instansi"           => $this->input->post('id_instansi', true),
            // "id_status_surat"       => $this->input->post('id_status_surat', true),
            // "isi"                   => $this->input->post('isi', true),
            // "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            // "tanggal_diterima"      => $this->input->post('tanggal_diterima', true),
            // "keterangan"            => $this->input->post('keterangan', true),
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

    // delete surat keluar data by id
    public function deleteSuratKeluar($id)
    {
        $this->db->where('id_surat_keluar', $id);
        $this->db->delete('surat_keluar');
    }
}
