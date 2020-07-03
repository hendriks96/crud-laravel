<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jawaban;
use App\pertanyaan;

class JawabanController extends Controller
{
    public function index($pertanyaan_id){
        $pertanyaan = pertanyaan::where('id_pertanyaan',$pertanyaan_id)->first();
        $jawaban = jawaban::where('id_pertanyaan', $pertanyaan_id)->get();
        // dd($pertanyaan);
        $datas['pertanyaan'] = $pertanyaan->isi;
        $datas['allJawaban'] = $jawaban;
        $datas['pertanyaan_id'] = $pertanyaan->id_pertanyaan;
        return view('tables-jawaban', $datas);
    }

    public function create($pertanyaan_id){
        $datas['pertanyaan_id'] = $pertanyaan_id;
        return view('create_jawaban', $datas);
    }

    public function store(Request $request){
        $pertanyaan_id = $request['id_pertanyaan'];
        $jawaban = $request['isi'];

        $insertJawaban = new jawaban;
        $insertJawaban->isi = $jawaban;
        $insertJawaban->id_pertanyaan = $pertanyaan_id;
        $insertJawaban->save();

        $pertanyaan = pertanyaan::where('id_pertanyaan',$pertanyaan_id)->first();
        $jawaban = jawaban::where('id_pertanyaan', $pertanyaan_id)->get();
        // dd($pertanyaan);
        $datas['pertanyaan'] = $pertanyaan->isi;
        $datas['allJawaban'] = $jawaban;
        $datas['pertanyaan_id'] = $pertanyaan->id_pertanyaan;
        return view('tables-jawaban', $datas);
    }
}
