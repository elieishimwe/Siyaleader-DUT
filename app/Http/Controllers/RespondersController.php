<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CaseResponder;

class RespondersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {

        $caseResponders = \DB::table('caseOwners')
                        ->where('caseId','=',$id)
                        ->where('type','>',0)
                        ->join('users','users.id','=','caseOwners.user')
                        ->join('positions','users.position','=','positions.id')
                        ->select(array('users.id','users.name','users.surname','users.cellphone','positions.name as position','caseOwners.type','caseOwners.accept'));

        return \Datatables::of($caseResponders)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-dest="{{$id}}" data-name="{{$name}} {{$surname}}" data-toggle="modal" onClick="launchMessageModal({{$id}},this);" data-target=".compose-message"><i class="fa fa-envelope"></i></a>'
                                       )
                            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeSubSubResponder(Request $request)
    {

        $sub_sub_cat = $request['subsubCategoryID'];
        $result = CaseResponder::where('sub_sub_category','=',$sub_sub_cat)->first();

        if($result)
        {
            $result->firstResponder   = $request['firstResponder'];
            $result->secondResponder  = $request['secondResponder'];
            $result->thirdResponder   = $request['thirdResponder'];
            $result->save();
            \Session::flash('success','Responders have been successfully added!');
            return redirect()->back();



        }
        else {

            $responder                   = new CaseResponder();
            $responder->department       = $request['deptID'];
            $responder->category         = $request['catID'];
            $responder->sub_category     = $request['subCatID'];
            $responder->sub_sub_category = $request['subsubCategoryID'];
            $responder->firstResponder   = $request['firstResponder'];
            $responder->secondResponder  = $request['secondResponder'];
            $responder->thirdResponder   = $request['thirdResponder'];
            $responder->active           = 1;
            $responder->save();

        \Session::flash('success','Responders have been successfully added!');
        return redirect()->back();




        }

    }


      public function storeSubResponder(Request $request)
    {


        $sub_cat = $request['subCatID'];
        $result  = CaseResponder::where('sub_category','=',$sub_cat)
                                ->where('sub_sub_category','=',0)
                                ->first();

        if($result)
        {
            $result->firstResponder   = $request['firstResponder'];
            $result->secondResponder  = $request['secondResponder'];
            $result->thirdResponder   = $request['thirdResponder'];
            $result->save();
            \Session::flash('success','Responders have been successfully added!');
            return redirect()->back();



        }
        else {

            $responder                   = new CaseResponder();
            $responder->department       = $request['deptID'];
            $responder->category         = $request['catID'];
            $responder->sub_category     = $request['subCatID'];
            $responder->firstResponder   = $request['firstResponder'];
            $responder->secondResponder  = $request['secondResponder'];
            $responder->thirdResponder   = $request['thirdResponder'];
            $responder->active           = 1;
            $responder->save();

        \Session::flash('success','Responders have been successfully added!');
        return redirect()->back();




        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    public function subResponder($id)
    {

        $firstRespondersObj  = CaseResponder::where("sub_category",'=',$id)
                                                ->select('firstResponder')->first();

        $secondRespondersObj = CaseResponder::where("sub_category",'=',$id)
                                                ->select('secondResponder')->first();

        $thirdRespondersObj  = CaseResponder::where("sub_category",'=',$id)
                                                ->select('thirdResponder')->first();

        $response            = array();

        if (sizeof($firstRespondersObj) > 0) {

            $firstResponders = explode(",",$firstRespondersObj->firstResponder);

                if ($firstRespondersObj->firstResponder > 0) {

                           foreach ($firstResponders as $firstResponder) {

                             $user = \DB::table('users')
                                        ->where('id','=',$firstResponder)
                                        ->select(\DB::raw(
                                                    "
                                                    id,
                                                    (select CONCAT(name, ' ',surname) ) as firstResponder

                                                    "
                                                      )
                                                )->first();

                            $response[] = $user;

                            }

                }

        }

        if (sizeof($secondRespondersObj) > 0) {

            $secondResponders = explode(",",$secondRespondersObj->secondResponder);

            if ($secondRespondersObj->secondResponder > 0) {

                foreach ($secondResponders as $secondResponder) {

                     $user = \DB::table('users')
                                ->where('id','=',$secondResponder)
                                ->select(\DB::raw(
                                            "
                                            id,
                                            (select CONCAT(name, ' ',surname) ) as secondResponder

                                            "
                                              )
                                        )->first();

                    $response[] = $user;

                 }

            }

        }

        if (sizeof($thirdRespondersObj) > 0) {

            $thirdResponders  = explode(",",$thirdRespondersObj->thirdResponder);

            if ($thirdRespondersObj->thirdResponder > 0) {

                 foreach ($thirdResponders as $thirdResponder) {

                     $user = \DB::table('users')
                                ->where('id','=',$thirdResponder)
                                ->select(\DB::raw(
                                            "
                                            id,
                                            (select CONCAT(name, ' ',surname) ) as thirdResponder

                                            "
                                              )
                                        )->first();

                    $response[] = $user;

                 }

             }

        }

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function subSubResponder($id)
    {

       $firstRespondersObj  = CaseResponder::where("sub_sub_category",'=',$id)
                                                ->select('firstResponder')->first();

        $secondRespondersObj = CaseResponder::where("sub_sub_category",'=',$id)
                                                ->select('secondResponder')->first();

        $thirdRespondersObj  = CaseResponder::where("sub_sub_category",'=',$id)
                                                ->select('thirdResponder')->first();

        $response            = array();

        if (sizeof($firstRespondersObj) > 0) {
            $firstResponders  = explode(",",$firstRespondersObj->firstResponder);

                if ($firstRespondersObj->firstResponder > 0) {

                           foreach ($firstResponders as $firstResponder) {

                             $user = \DB::table('users')
                                        ->where('id','=',$firstResponder)
                                        ->select(\DB::raw(
                                                    "
                                                    id,
                                                    (select CONCAT(name, ' ',surname) ) as firstResponder

                                                    "
                                                      )
                                                )->first();

                            $response[] = $user;

                            }

                }

        }

        if (sizeof($secondRespondersObj) > 0) {

            $secondResponders = explode(",",$secondRespondersObj->secondResponder);

            if ($secondRespondersObj->secondResponder > 0) {

                foreach ($secondResponders as $secondResponder) {

                     $user = \DB::table('users')
                                ->where('id','=',$secondResponder)
                                ->select(\DB::raw(
                                            "
                                            id,
                                            (select CONCAT(name, ' ',surname) ) as secondResponder

                                            "
                                              )
                                        )->first();

                    $response[] = $user;

                 }

            }

        }

        if (sizeof($thirdRespondersObj) > 0) {

            $thirdResponders  = explode(",",$thirdRespondersObj->thirdResponder);

            if ($thirdRespondersObj->thirdResponder > 0) {

                 foreach ($thirdResponders as $thirdResponder) {

                     $user = \DB::table('users')
                                ->where('id','=',$thirdResponder)
                                ->select(\DB::raw(
                                            "
                                            id,
                                            (select CONCAT(name, ' ',surname) ) as thirdResponder

                                            "
                                              )
                                        )->first();

                    $response[] = $user;

                 }

             }

        }

        return $response;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
