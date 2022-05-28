<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardpetugas extends BaseController
{
    public function index()
    {
        $data['intro']='<div class="jumbotron mt-5">
		<h1>Hello, '.session()->get('nama_petugas').'</h1>
		<p>Silakan gunakan halaman ini untuk menampilkan informasi Hotel!</p>
	  </div>';
        return view ('Dashboard', $data);
    }
}
