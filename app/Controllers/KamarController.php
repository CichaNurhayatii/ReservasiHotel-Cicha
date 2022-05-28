<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use  App\Models\Kamar;
class KamarController extends BaseController
{
    public function index(){
        $Kamar = new Kamar;
            $Kamar->join('tbl_fasilitas_kamar', 'tbl_fasilitas_kamar.id_fasilitas=tbl_kamar.id_fasilitas' );
            $data['ListKamar'] = $Kamar->findAll();
            return view('kamar/card-tampil', $data);
    }

    public function tambahKamar(){
        helper(['form']);
        $aturanForm=[
            'txtNoKamar'=>'required',
            'txtInputTipeKamar'=>'required',
            'txtTarif'=>'required'
        ];
        
        if($this->validate($aturanForm)){
            $foto=$this->request->getFile('txtInputFoto');
            $foto->move('gambar');
            $data=[
                'no_kamar'=>$this->request->getPost('txtNoKamar'),
                'id_fasilitas'=>$this->request->getPost('txtInputTipeKamar'),
                'tarif'=>$this->request->getPost('txtTarif'),
                'foto'=> $foto->getClientName()
            ];
            $this->kamar->save($data);
            return redirect()->to(site_url('/kamar'))->with('berhasil', 'Data Berhasil di Tambah');
        }
            $data['ListTipe'] = $this->fasilitaskamar->findAll();
            return view ('kamar/tambah-kamar', $data);
    }

    public function editKamar($idkamar=null){
        if($idkamar!=null){
            $syarat=[
                'id_kamar' => $idkamar
            ];
            $Kamar = new Kamar;
            $Kamar->join('tbl_fasilitas_kamar', 'tbl_fasilitas_kamar.id_fasilitas=tbl_kamar.id_fasilitas' );
            $data['detailKamar'] = $Kamar->where('id_kamar',$idkamar)->findAll()[0];
            $data['ListTipe'] = $this->fasilitaskamar->findAll();
        }

        helper(['form']);
        $aturanForm=[
            'txtNoKamar'=>'required',
            'txtTarif'=>'required'
        ];

        if($this->validate($aturanForm)){
            $foto=$this->request->getFile('txtFotoKamar');
            $syarat=$this->request->getPost('txtFoto');
            if($foto->isValid()){
                unlink('gambar/'.$syarat);
                $foto->move('gambar');
                $data=[
                    'no_kamar'=> $this->request->getPost('txtNoKamar'),
                    'id_fasilitas'=>$this->request->getPost('txtInputTipeKamar'),
                    'tarif' => $this->request->getPost('txtTarif'),
                    'foto'=> $foto->getClientName()
                ];
            } else {
                $data=[
                    'no_kamar'=> $this->request->getPost('txtNoKamar'),
                    'id_fasilitas'=>$this->request->getPost('txtInputTipeKamar'),
                    'tarif' => $this->request->getPost('txtTarif')
                ];
            }
            $Kamar = new Kamar;
            $Kamar->update($this->request->getPost('txtIdKamar'),$data);
            return redirect()->to(site_url('/kamar'))->with('berhasil','Data berhasil diupdate');
        }
            
            return view('kamar/edit-kamar',$data);

    }

    public function hapusKamar($idkamar){
            $syarat=['id_kamar'=>$idkamar];
            $Kamar = new Kamar;
            $infoFile=$Kamar->where($syarat)->find();
            //hapus file foto
           // unlink('gambar/'.$infoFile[0]['foto']);
            //hapus data didatabase
            $Kamar = new Kamar;
            $Kamar->where('id_kamar',$idkamar)->delete();
            return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di Hapus');

    }
}
