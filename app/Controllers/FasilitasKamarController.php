<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar;

use App\Models\FasilitasKamar;

class FasilitasKamarController extends BaseController
{
    public function index()
    {
        $DataFasilitas = new FasilitasKamar;
        $data['ListKamar'] = $DataFasilitas->findAll();
        return view('fkamar/card-fasilitas', $data);
    }
    public function tambahFasilitasKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $DataKamar = new Kamar;
        $data['dataKamar'] = $DataKamar->findAll();
        return view('fkamar/tambah-fasilitas', $data);
    }
    public function simpanFasilitasKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        helper(['form']);
        $DataFasilitas = new FasilitasKamar;
        $datanya = [
            'tipe_kamar'=>$this->request->getPost('txtTipeKamar'),
            'fasilitas'=>$this->request->getPost('txtInputFasilitas'),
            
        ];
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        $DataFasilitas->insert($datanya);
        return redirect()->to('/fkamar');
    }
    public function editFasilitasKamar($id_fasilitas)
    {
        $DataFasilitas = new FasilitasKamar;
        $data['detailFasilitas'] = $DataFasilitas->where('id_fasilitas', $id_fasilitas)->first();
        return view('fkamar/edit-fkamar', $data);
    }
    public function updateFasilitasKamar()
    {
        $DataFasilitas = new FasilitasKamar;
        if($this->request->getPost('txtTipeKamar'))
        $data=[
        'tipe_kamar'=>$this->request->getPost('txtTipeKamar'),
        'fasilitas'=>$this->request->getPost('txtInputFasilitas'),
        ];

        session()->setFlashdata('pesan', 'Data berhasil di update');

        $DataFasilitas->update($this->request->getPost('txtIdKamar'),$data);
        return redirect()->to('/fkamar');
    }
    public function hapusFasilitasKamar($id_fasilitas)
    {
        $DataFasilitas = new FasilitasKamar;
        $DataFasilitas->where('id_fasilitas',$id_fasilitas)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/fkamar');
}

    }


