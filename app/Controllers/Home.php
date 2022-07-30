<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\KegiatanModel;

class Home extends BaseController
{
    function __construct()
    {
        $this->pegawai = new PegawaiModel();
        $this->kegiatan = new KegiatanModel();
    }
    public function index()
    {
        return view('welcome_message');
    }

    public function kegiatan()
    {
        $data['datak'] = $this->kegiatan->getAll();
        return view('kegiatan/index', $data);
    }

    public function add_kegiatan()
    {
        $data['pegawai'] = $this->pegawai->findAll();
        return view('kegiatan/tambah', $data);
    }

    public function add_proses()
    {
        if (!$this->validate([
            'kegiatan'  => [
                'rules' => 'required',
                'errors' => [
                    'required'  => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->kegiatan->insert([
            'kegiatan' => $this->request->getVar('kegiatan'),
            'verified_by' => $this->request->getVar('verifikasi'),
        ]);
        session()->setFlashdata('message', 'Tambah Data Kegiatan Berhasil');
        return redirect()->to('/kegiatan');
    }

    public function edit_kegiatan($id)
    {
        $datakegiatan = $this->kegiatan->find($id);
        if (empty($datakegiatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kegiatan Tidak ditemukan !');
        }
        $data['pegawai'] = $this->pegawai->findAll();
        $data['datak'] = $datakegiatan;
        return view('kegiatan/edit', $data);
    }

    public function edit_proses($id)
    {
        if (!$this->validate([
            'kegiatan'  => [
                'rules' => 'required',
                'errors' => [
                    'required'  => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $this->kegiatan->update($id, [
            'kegiatan' => $this->request->getVar('kegiatan'),
            'verified_by' => $this->request->getVar('verifikasi'),
        ]);
        session()->setFlashdata('message', 'Update data Kegiatan Berhasil');
        return redirect()->to('/kegiatan');
    }

    public function hapus_proses($id)
    {
        $datakegiatan = $this->kegiatan->find($id);
        if (empty($datakegiatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kegiatan Tidak ditemukan !');
        }
        $this->kegiatan->delete($id);
        session()->setFlashdata('message', 'Delete Data Kegiatan Berhasil');
        return redirect()->to('/kegiatan');
    }
}
