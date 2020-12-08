<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserVerification extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user=\App\Models\UserVerification::whereUserId(Auth::id())->firstOrFail();
        return view('pages.user-verification.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
           'file'=>'mimes:jpeg,jpg,png|max:10000' // max 2000kb
        ]);
        $data=$request->all();
        if (!isset($data['status'])){
        $data['status']=1;
        }
        if (isset($data['file'])){
//            dd($data['file']);
//            dd($request->file('file')->extension());
            $data['image']=date('dmyHis').'.'.$request->file('file')->extension();
            Storage::putFileAs('public/user-verification',$request->file('file'),$data['image']);
        }
//        dd($data);
        unset($data['file']);
        unset($data['_token']);
        unset($data['_method']);
        \App\Models\UserVerification::find($id)->update($data);
        return redirect(route('admin.dashboard'));
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
