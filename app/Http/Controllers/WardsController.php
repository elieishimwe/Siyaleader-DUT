<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WardRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ward;

class WardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $wards = Ward::select(array('id','name','created_at'));
        return \Datatables::of($wards)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateWardModal({{$id}});" data-target=".modalEditWard">Edit</a>')
                            ->make(true);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Ward $ward)
    {

        $ward    = Ward::where('id',$id)->first();
        return [$ward];
    }


    public function update(WardRequest $request)
    {
        $ward             = Ward::where('id',$request['wardID'])->first();
        $ward->name       = $request['name'];
        $ward->updated_by = \Auth::user()->id;
        $ward->save();
        \Session::flash('success', 'well done! Ward '.$request['name'].' has been successfully added!');
        return redirect()->back();
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
