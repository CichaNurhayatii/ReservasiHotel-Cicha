<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FasilitasHotel;

class FasilitasHotelController extends BaseController
{
    public function index()
    {
                $FasilitasHotel = new FasilitasHotel;
                $data['ListFasilitas'] = $FasilitasHotel->findAll();
                return view('fhotel/card-hotel', $data);
            }
            public function tambahFasilitasHotel()
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
                return view('fhotel/tambah-fasilitas_hotel');
            }
            public function simpanFasilitasHotel()
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
                $file = $this->request->getFile('txtInputFoto');
                $file->move(WRITEPATH . '../public/gambar/');
                $datanya = [
                    'jenis' => $this->request->getPost('txtFasilitas'),
                    'gambar'=> $file->getname(),
                    'deskripsi' => $this->request->getPost('txtDes'),
                ];
                session()->setFlashdata('pesan', 'Data berhasil di Simpan');
                $FasilitasHotel = new FasilitasHotel;
                $FasilitasHotel->insert($datanya);
                return redirect()->to('/fhotel');
            }

            public function EditFasilitasHotel($idfasilitas)
            {
                
                    $FasilitasHotel = new FasilitasHotel;
                    $data['ListFasilitas']=$FasilitasHotel->find($idfasilitas);
                
                return view('fhotel/edit-fhotel', $data);
            }
            
            public function UpdateFasilitasHotel($id_fasilitas_hotel=null){
                if($id_fasilitas_hotel!=null){
                    $syarat=[
                        'idfasilitas' => $id_fasilitas_hotel
                    ];
                    $FasilitasHotel = new FasilitasHotel;
                    $data['ListFasilitas']=$FasilitasHotel->where($syarat)->find()[0];
                }
        
                helper(['form']);
                $aturanForm=[
                    'txtFasilitas'=>'required',
                    'txtDes'=>'required'
                ];
        
                
                    $foto=$this->request->getFile('txtFotoFasilitas');
                    $foto->move(WRITEPATH. '../public/gambar');
                        $data=[
                            'jenis'=> $this->request->getPost('txtFasilitas'),
                            'deskripsi' => $this->request->getPost('txtDes'),
                            'gambar'=> $foto->getName()
                        ];
                    $FasilitasHotel = new FasilitasHotel;
                    $FasilitasHotel->update($this->request->getPost('txtId'),$data);
                    return redirect()->to(site_url('/fhotel'))->with('berhasil','Data berhasil diupdate');
                
                return view('fhotel/edit-fhotel',$data);
            }
            public function hapusFasilitasHotel($idfasilitas)
            {   
                $FasilitasHotel = new FasilitasHotel;
                $syarat=['idfasilitas'=> $idfasilitas];
                $FasilitasHotel = new FasilitasHotel;
                $file = $FasilitasHotel->where($syarat)->find();

                // $file = $FasilitasHotel[0]['foto'];
                // if ($file->isValid() && !$file->hasMoved()) {
                //if (file_exists('gambar/' . $file[0]['gambar'])){
                //unlink('gambar/' . $file[0]['gambar']);
            //}
            // }
            //hapus file foto
            $FasilitasHotel->where('idfasilitas',$idfasilitas)->delete();
            return redirect()->to('/fhotel')->with('berhasil', 'Data Berhasil di hapus');
}
    }
        
           
        
    
    

