<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluarModel extends CI_Model
{


    public function getAllSuratKeluar($id = null)
    {
        $this->db->select('surat_keluar.*, instansi.nama_instansi as nama_instansi, status_surat.status as status');
        $this->db->from('surat_keluar');
        $this->db->join('instansi', 'instansi.id_instansi = surat_keluar.id_instansi');
        $this->db->join('status_surat', 'status_surat.id_status_surat = surat_keluar.id_status_surat');
        $this->db->order_by("surat_keluar.id_surat_keluar", "DESC");

        if ($id != null) {
            $this->db->where('surat_keluar.id_surat_keluar', $id);
        }

        $query = $this->db->get();
        return $query;
    }


    public function addSuratKeluar($file)
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true)),
            "file_surat"            => $file
        ];

        $this->db->insert('surat_keluar', $data);
    }

    public function addSuratKeluar1()
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $this->db->insert('surat_keluar', $data);
    }


    public function getByIdSuratKeluar($id)
    {
        return $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row_array();
    }


    public function detailSuratKeluar($id)
    {
        $result = $this->db->where('id_surat_keluar', $id)->get('surat_keluar');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function editSuratKeluar($file)
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true)),
            "file_surat"            => $file
        ];

        $this->db->where('id_surat_keluar', $this->input->post('id_surat_keluar'));
        $this->db->update('surat_keluar', $data);
    }

    public function editSuratKeluar1()
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $this->db->where('id_surat_keluar', $this->input->post('id_surat_keluar'));
        $this->db->update('surat_keluar', $data);
    }

    public function getCountDataSuratKeluar()
    {
        return $this->db->query("select * from surat_keluar");
    }


    public function deleteSuratKeluar($id)
    {
        $this->db->where('id_surat_keluar', $id);
        $this->db->delete('surat_keluar');
    }
}
