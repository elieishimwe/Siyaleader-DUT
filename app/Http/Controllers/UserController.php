<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\User;
use App\Position;
use App\Province;
use App\District;
use App\Municipality;
use App\Ward;
use App\Department;
use App\Title;


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
        $users = User::select(array('id','created_at','name','surname','email','username','cellphone'));

        return \Datatables::of($users)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser" >Edit</a>


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

        $role                = UserRole::where('slug','=',$request['role'])->first();
        $user->role          = $role->id;
        $title               = Title::where('slug','=',$request['title'])->first();
        $user->title         = $title->id;
        $user->name          = $request['name'];
        $user->surname       = $request['surname'];
        $user->cellphone     = $request['cellphone'];
        $user->alt_cellphone = $request['alt_cellphone'];
        $user->email         = $request['email'];
        $user->alt_email     = $request['alt_email'];
        $province            = Province::where('slug','=',$request['province'])->first();
        $user->province      = $province->id;
        $district            = District::where('slug','=',$request['district'])->first();
        $user->district      = $district->id;
        $municipality        = Municipality::where('slug','=',$request['municipality'])->first();
        $user->municipality  = $municipality->id;
        $ward                = Ward::where('slug','=',$request['ward'])->first();
        $user->ward          = $ward->id;
        $department          = Department::where('slug','=',$request['department'])->first();
        $user->department    = $department->id;
        $position            = Position::where('slug','=',$request['position'])->first();
        $user->position      = $position->id;
        $password            = rand(1000,99999);
        $user->password      = \Hash::make($password);
        $user->api_key       = uniqid();
        $user->created_by    = \Auth::user()->id;
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
    public function edit($id,User $user)
    {

         $user = \DB::table('users')
            ->join('users_roles', 'users.role', '=', 'users_roles.id')
            ->join('titles', 'users.title', '=', 'titles.id')
            ->join('provinces', 'users.province', '=', 'provinces.id')
            ->join('districts', 'users.district', '=', 'districts.id')
            ->join('departments', 'users.department', '=', 'departments.id')
            ->join('positions', 'users.position', '=', 'positions.id')
            ->where('users.id','=',$id)
            ->select(\DB::raw("users.id,users.name,users.surname,users.id_number,users_roles.slug as role,titles.slug as title,provinces.slug as province,districts.slug as district,departments.slug as department,positions.slug as position"))
            ->first();

        return [$user];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request)
    {
        $user       = User::where('id',$request['userID'])->first();
        dd($user);
        $user->name = $request['name'];
        $user->updated_by = \Auth::user()->id;
        $user->save();
        \Session::flash('success', 'well done! Role '.$request['name'].' has been successfully added!');
        return redirect()->back();
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
