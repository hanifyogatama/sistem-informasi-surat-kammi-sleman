<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasukModel extends CI_Model
{
    // get all data
    public function getAllSuratMasuk($id = null)
    {
        $this->db->select('surat_masuk.*, instansi.nama_instansi as nama_instansi, status_surat.status as status');
        $this->db->from('surat_masuk');
        $this->db->join('instansi', 'instansi.id_instansi = surat_masuk.id_instansi');
        $this->db->join('status_surat', 'status_surat.id_status_surat = surat_masuk.id_status_surat');

        if ($id != null) {
            $this->db->where('id_surat_masuk', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // add data
    public function addSuratMasuk($file)
    {
        $data = [
            "no_surat"              => $this->input->post('no_surat', true),
            "id_instansi"           => $this->input->post('id_instansi', true),
            "id_status_surat"       => $this->input->post('id_status_surat', true),
            "isi"                   => $this->input->post('isi', true),
            "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            "tanggal_diterima"      => $this->input->post('tanggal_diterima', true),
            "keterangan"            => $this->input->post('keterangan', true),
            "file_surat"            => $file
        ];

        $this->db->insert('surat_masuk', $data);
    }

    // get data by id
    public function getByIdSuratMasuk($id_surat_masuk)
    {
        return $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id_surat_masuk])->row_array();
    }

    // edit data by id
    public function editSuratMasuk($file)
    {
        $data = [
            "no_surat"              => $this->input->post('no_surat', true),
            "id_instansi"           => $this->input->post('id_instansi', true),
            "id_status_surat"       => $this->input->post('id_status_surat', true),
            "isi"                   => $this->input->post('isi', true),
            "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            "tanggal_diterima"      => $this->input->post('tanggal_diterima', true),
            "keterangan"            => $this->input->post('keterangan', true),
            "file_surat"            => $file
        ];

        $this->db->where('id_surat_masuk', $this->input->post('id_surat_masuk'));
        $this->db->update('surat_masuk', $data);
    }

    public function getCountDataSuratMasuk()
    {
        return $this->db->query("select * from surat_masuk");
    }

    public function detailSuratMasuk($id)
    {
        $result = $this->db->where('id_surat_masuk', $id)->get('surat_masuk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    // delete data by id
    public function deleteSuratMasuk($id)
    {
        $this->db->where('id_surat_masuk', $id);
        $this->db->delete('surat_masuk');
    }

    public function addDisposisi()
    {
        $data = [
            "id_surat_masuk"        => $this->input->post('id_surat_masuk', true),
            "id_departemen"         => $this->input->post('id_departemen', true),
            "batas_waktu"           => $this->input->post('batas_waktu', true),
            "id_status_surat"       => $this->input->post('id_status_surat', true),
            "isi"                   => $this->input->post('isi', true),
            "keterangan"            => $this->input->post('keterangan', true),

        ];

        $this->db->insert('disposisi', $data);
    }
}
