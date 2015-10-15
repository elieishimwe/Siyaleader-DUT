<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CaseReport;
use App\CaseOwner;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {


        if (\Auth::check())
        {

            if (\Auth::user()->role == 1) {

                $numberReferredCases = \DB::table('cases')
                                ->join('caseOwners', 'cases.id', '=', 'caseOwners.caseId')
                                ->where('cases.status','<>','Pending Closure')
                                ->where('cases.status','<>','Resolved')
                                ->groupBy('cases.id')
                                ->get();

                $numberPendingClosureCases = \DB::table('cases')
                                            ->join('caseOwners', 'cases.id', '=', 'caseOwners.caseId')
                                            ->where('cases.status','=','Pending Closure')
                                            ->groupBy('cases.id')
                                            ->get();

                $numberResolvedCases = \DB::table('cases')
                                        ->join('caseOwners', 'cases.id', '=', 'caseOwners.caseId')
                                        ->where('cases.status','=','Resolved')
                                        ->groupBy('cases.id')
                                        ->get();

                $numberPendingCases = \DB::table('cases')
                                        ->where('cases.status','=','Pending')
                                        ->get();

            }
            else {

                $numberReferredCases = \DB::table('cases')
                                        ->join('caseOwners', 'cases.id', '=', 'caseOwners.caseId')
                                        ->where('cases.status','<>','Pending Closure')
                                        ->where('cases.status','<>','Resolved')
                                        ->where('caseOwners.user','=',\Auth::user()->id)
                                        ->groupBy('cases.id')
                                        ->get();

                $numberPendingClosureCases = \DB::table('cases')
                                            ->join('caseOwners', 'cases.id', '=', 'caseOwners.caseId')
                                            ->where('cases.status','=','Pending Closure')
                                            ->where('caseOwners.user','=',\Auth::user()->id)
                                            ->groupBy('cases.id')
                                            ->get();

                $numberResolvedCases = \DB::table('cases')
                                        ->join('caseOwners', 'cases.id', '=', 'caseOwners.caseId')
                                        ->where('cases.status','=','Resolved')
                                        ->where('caseOwners.user','=',\Auth::user()->id)
                                        ->groupBy('cases.id')
                                        ->get();

            }

            return view('home.home',compact('numberReferredCases','numberPendingClosureCases','numberResolvedCases','numberPendingCases'));

        }
        else {

            \Auth::logout();
        }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
