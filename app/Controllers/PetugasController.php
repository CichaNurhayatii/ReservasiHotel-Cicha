<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;

class PetugasController extends BaseController

{
    
    public function index()
    {
        return view('v_login');
    }
    public function login()
    {
        $this->petugas = New Petugas;
        $syarat = [
            'username' =>
            $this->request->getPost('txtUsername'),
            'password' => md5($this->request->getPost('txtPassword'))
        ];
        $Userpetugas =
            $this->petugas->where($syarat)->find();
        if (count($Userpetugas) == 1) {
            $session_data = [
                'username' => $Userpetugas[0]['username'],
                'id_petugas' => $Userpetugas[0]['id_petugas'], 'level' => $Userpetugas[0]['level'], 'sudahkahLogin' => TRUE
            ];
            session()->set($session_data);
            return redirect()->to('/petugas/dashboard');
        } else {
            return redirect()->to('/petugas');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

}