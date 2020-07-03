<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pertanyaan;

class PertanyaanController extends Controller
{
    //
    public function index(){
        $allData = pertanyaan::all();
        $datas['allData'] = $allData;
        return view('tables', $datas);
    }

    public function create(){
        return view('create_pertanyaan');
    }

    public function store(Request $request){
        $judul = $request['judul'];
        $isi = $request['isi'];

        //insert data
        $insertPertanyaan = new pertanyaan;
        $insertPertanyaan->judul = $judul;
        $insertPertanyaan->isi = $isi;
        $insertPertanyaan->save();

        $allData = pertanyaan::all();
        $datas['allData'] = $allData;
        return view('tables', $datas);
    }
}
