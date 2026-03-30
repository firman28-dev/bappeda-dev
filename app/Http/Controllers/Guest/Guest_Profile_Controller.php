<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\PegawaiBappeda;
use App\Models\Pejabat;
use Illuminate\Http\Request;

class Guest_Profile_Controller extends Controller
{
    public function index(){
        $pejabat = Pejabat::all();
        $sent = [
            'pejabat' => $pejabat
        ];
        return view('guest.profile.index', $sent);
    }
    public function show($id){
        $pejabat = Pejabat::find($id);
        if ($pejabat) {
            // return $pejabat;
            $sent = [
                'pejabat' => $pejabat
            ];
            return view('guest.profile.detail', $sent);
        }
        else{
            return view('guest.error_page.error_404');
        }
        
    }

    public function showPegawai(){
        $pegawai = PegawaiBappeda::orderBy('level','asc')->where('status','A')->get();
        if ($pegawai) {
            $sent = [
                'pegawai' => $pegawai
            ];
            return view('guest.profile.list_employee', $sent);
        }
        else{
            return view('guest.error_page.error_404');
        }
        
    }
}
