<?php

namespace App\Http\Controllers;

use App\jawaban;
use Illuminate\Http\Request;

use App\pertanyaan;

class PertanyaanController extends Controller
{
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

        return redirect('/pertanyaan');
    }

    public function pertanyaanDetail($id){
        $allJawaban = [];
        $i = 0;
        $datas['jawaban'] = [];
        $pertanyaan = pertanyaan::where('id_pertanyaan', $id)->first();

        $createDate = $pertanyaan->created_at->format('d, M Y H:i');
        $lastUpdate = $pertanyaan->updated_at->format('d, M Y H:i');
        $datas['pertanyaan'] = $pertanyaan;
        $datas['created'] = $createDate;
        $datas['updated'] = $lastUpdate;

        $jawaban = jawaban::where('id_pertanyaan', $id)->get();
        // dd($jawaban);
        if(count($jawaban) > 0){
            foreach($jawaban as $item){
                $createdAtJawaban = $item['created_at'];
                $createDateJawaban = $createdAtJawaban->format('d, M Y H:i');
                $allJawaban['id_jawaban'] = $item['id_jawaban'];
                $allJawaban['isi'] = $item['isi'];
                $allJawaban['created_at'] = $createDateJawaban;
                $datas['jawaban'][$i] = $allJawaban;
                $i++;
            }
        }

        return view('pertanyaan-detail', $datas);
    }

    public function pertanyaanEdit($id){
        $pertanyaan = pertanyaan::where('id_pertanyaan', $id)->first();
        $datas['pertanyaan'] = $pertanyaan;
        return view('edit-pertanyaan', $datas);
    }

    public function pertanyaanUpdate($id, Request $request){
        // dd($request->all());
        $updateData = pertanyaan::where('id_pertanyaan', $id)
                        ->update([
                            'judul' => $request['judul'],
                            'isi' => $request['isi']
                            ]);
        return redirect('/pertanyaan');
    }

    public function pertanyaanDelete($id){
        pertanyaan::where('id_pertanyaan', $id)->delete();
        return redirect('/pertanyaan');
    }
}
