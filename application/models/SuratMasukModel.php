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
        $this->db->order_by('surat_masuk.id_surat_masuk', 'DESC');

        if ($id != null) {
            $this->db->where('surat_masuk.id_surat_masuk', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // add data
    public function addSuratMasuk($file)
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "tanggal_diterima"      => htmlspecialchars($this->input->post('tanggal_diterima', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true)),
            "file_surat"            => $file
        ];

        $this->db->insert('surat_masuk', $data);
    }

    public function addSuratMasuk1()
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "tanggal_diterima"      => htmlspecialchars($this->input->post('tanggal_diterima', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true))

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
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "tanggal_diterima"      => htmlspecialchars($this->input->post('tanggal_diterima', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true)),
            "file_surat"            => $file
        ];

        $this->db->where('id_surat_masuk', $this->input->post('id_surat_masuk'));
        $this->db->update('surat_masuk', $data);
    }


    public function editSuratMasuk1()
    {
        $data = [
            "no_surat"              => htmlspecialchars($this->input->post('no_surat', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "tanggal_surat"         => htmlspecialchars($this->input->post('tanggal_surat', true)),
            "tanggal_diterima"      => htmlspecialchars($this->input->post('tanggal_diterima', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true))

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

    public function getAllDisposisi($id = null)
    {
        $query = "SELECT * FROM disposisi ORDER BY id_disposisi DESC";
        return $this->db->query($query)->result_array();
    }

    public function getAllDisposisi2($id = null)
    {
        $this->db->select('disposisi.*, departemen.nama_departemen as nama_departemen, status_surat.status as status,surat_masuk.no_surat as nomor_surat,surat_masuk.tanggal_surat as tanggal_surat, surat_masuk.tanggal_diterima as tanggal_diterima,instansi.nama_instansi as nama_instansi');
        $this->db->from('disposisi');
        $this->db->join('departemen', 'departemen.id_departemen = disposisi.id_departemen');
        $this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk');
        $this->db->join('status_surat', 'status_surat.id_status_surat = disposisi.id_status_surat');
        $this->db->join('instansi', 'instansi.id_instansi = disposisi.id_instansi');
        $this->db->order_by('disposisi.id_disposisi', 'DESC');


        if ($id != null) {
            $this->db->where('disposisi.id_disposisi',  $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // add diposisi data
    public function addDisposisi()
    {
        $data = [
            "id_surat_masuk"        => htmlspecialchars($this->input->post('id_surat_masuk', true)),
            "id_departemen"         => htmlspecialchars($this->input->post('id_departemen', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "batas_waktu"           => htmlspecialchars($this->input->post('batas_waktu', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true)),
            "tanggal_dibuat"        => date('Y-m-d')
        ];

        $this->db->insert('disposisi', $data);
    }

    // get disposisi by id
    public function getByIdDisposisi($id)
    {
        return $this->db->get_where('disposisi', ['id_disposisi' => $id])->row_array();
    }

    // edit disposisi
    public function editDisposisi()
    {
        $data = [
            "id_surat_masuk"        => htmlspecialchars($this->input->post('id_surat_masuk', true)),
            "id_departemen"         => htmlspecialchars($this->input->post('id_departemen', true)),
            "id_instansi"           => htmlspecialchars($this->input->post('id_instansi', true)),
            "batas_waktu"           => htmlspecialchars($this->input->post('batas_waktu', true)),
            "id_status_surat"       => htmlspecialchars($this->input->post('id_status_surat', true)),
            "isi"                   => htmlspecialchars($this->input->post('isi', true)),
            "keterangan"            => htmlspecialchars($this->input->post('keterangan', true)),
        ];

        $this->db->where('id_disposisi', $this->input->post('id_disposisi'));
        $this->db->update('disposisi', $data);
    }

    // delete disposisi
    public function deleteDisposisi($id)
    {
        $this->db->where('id_disposisi', $id);
        $this->db->delete('disposisi');
    }
}
