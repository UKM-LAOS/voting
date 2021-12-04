<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteCandidate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->vote){
            return redirect(route('admin.dashboard'))->with('status','Anda telah menggunakan hak pilih Anda');
        }
        if (Auth::user()->userVerification->status!=2){
            return redirect(route('admin.dashboard'))->with('status','Anda belum terverifikasi sebagai pemilih');
        }

        $candidates= Candidate::get();
        return view('pages.vote.index',compact('candidates'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->vote){
            return redirect(route('admin.dashboard'))->with('status','Anda telah menggunakan hak pilih Anda');
        }
        if (Auth::user()->userVerification->status!=2){
            return redirect(route('admin.dashboard'))->with('status','Anda belum terverifikasi sebagai pemilih');
        }
        $vote=Vote::create(['user_id'=>Auth::id(),'candidate_id'=>$id]);
//        dd($vote);
        return redirect(route('admin.dashboard'))->with('status','Anda telah berhasil memilih. Terima kasih atas partisipasinya.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
