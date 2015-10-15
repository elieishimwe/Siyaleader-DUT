<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Position;
use App\Province;
use App\District;
use App\Municipality;
use App\Department;


class UserController extends Controller
{

     private $user;


    public function __construct(User $user)
    {

        $this->user = $user;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::select(array('id','created_at','name','surname','email','username'));

        return \Datatables::of($users)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" href="{{ url("resend_password/$id") }}" >Resend password</a>


                                        '
                                )->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function responder()
    {
        $searchString = \Input::get('q');
        $contacts     = \DB::table('users')
            ->whereRaw("CONCAT(`name`, ' ', `surname`, ' ', `username`) LIKE '%{$searchString}%'")
            ->select(\DB::raw('*'))
            ->get();

        $data = array();

        if(count($contacts) > 0)
        {

           foreach ($contacts as $contact) {
           $data[]= array("name"=>"{$contact->name} {$contact->surname} <{$contact->username}","id" =>"{$contact->id}");
           }


        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request, User $user)
    {

        /*  New User Table */
        $user->name         = $request['Fname'];
        $user->surname      = $request['Sname'];
        $user->cellphone    = $request['Cell1'];
        $user->username     = $request['Email'];
        $user->email        = $request['Cell1'];
        $position           = Position::where('slug','=',$request['Position'])->first();
        $user->position     = $position->id;
        $province           = Province::where('slug','=',$request['Province'])->first();
        $user->province     = $province->id;
        $district           = District::where('slug','=',$request['District'])->first();
        $user->district     = $district->id;
        $municipalityIds    = array();
        foreach ($request['Municipality'] as $municipalityName) {
            $municipality      = Municipality::where('slug','=',$municipalityName)->first();
            $municipalityIds[] = $municipality->id;
        }
        $user->municipality = implode(",",$municipalityIds);
        $department         = Department::where('slug','=',$request['Department'])->first();
        $user->department   = $department->id;
        $password           = rand(1000,99999);
        $user->password     = \Hash::make($password);
        $user->api_key      = uniqid();
        $user->status       = 1;
        $user->role         = 2;
        $user->save();


         \Session::flash('success', $request['Fname'].' '.$request['Sname'].' has been added successfully!');


        $data = array(
            'name'     =>$user->name,
            'username' =>$user->email,
            'password' =>$user->password,
        );

        \Mail::send('emails.registrationConfirmation',$data, function($message) use ($user)
        {
            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($user->username)->subject("Siyaleader User Registration Confirmation: " .$user->name);

        });

        return redirect('list-users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function resendPassword($id)
    {



        return redirect('list-users');
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
