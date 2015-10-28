<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CaseRequest;
use App\Http\Controllers\Controller;
use App\CaseReport;
use App\CaseStatus;
use App\CaseOwner;
use App\User;
use App\UserRole;
use App\addressbook;
use App\CaseEscalator;
use App\CaseActivity;
use App\Department;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\CaseResponder;
use App\CriticalTeam;
use App\Language;
use App\Province;
use App\District;
use App\Municipality;
use App\Ward;
use App\CasePriority;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {

        $myCases    = CaseOwner::where('user','=',\Auth::user()->id)
                             ->get();

        $otherCases = CaseReport::where('user','=',\Auth::user()->id)
                             ->get();
        $caseIds    = array();



        foreach ($myCases as $case) {
            $caseIds[] = $case->caseId;
        }

        foreach ($otherCases as $caseOld) {
            $caseIds[] = $caseOld->id;
        }

        $caseIds = array_unique($caseIds);

        if (\Auth::user()->role == 1) {

              $cases = \DB::table('cases')
                ->join('cases_owners', 'cases.id', '=', 'cases_owners.case_id')
                ->where('cases.status','<>','Pending Closure')
                ->where('cases.status','<>','Resolved')
                ->select(\DB::raw("cases.id, cases.created_at,cases.description,cases.status,cases_owners.accept,cases_owners.type"))
                ->groupBy('cases.id');

        }
        else {

              $cases = \DB::table('cases')
                ->join('cases_owners', 'cases.id', '=', 'cases_owners.case_id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->whereIn('cases.id',$caseIds)
                ->where('cases_owners.user','=',\Auth::user()->id)
                ->where('cases_statuses.name','<>','Pending Closure')
                ->where('cases_statuses.name','<>','Resolved')
                ->select(\DB::raw("cases.id, cases.created_at,cases.description,cases_statuses.name as status,cases_owners.accept,cases_owners.type"))
                ->groupBy('cases.id');

        }


        return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>')
                            ->make(true);
    }


    public function requestCaseClosureList()
    {

        if (\Auth::user()->role == 1 || \Auth::user()->role == 3) {

            $cases = CaseReport::where('status','=','Pending Closure');
            return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>')
                            ->make(true);
        }
        else {

            $cases = CaseReport::where('status','=','Pending Closure')
                                ->where('user','=',\Auth::user()->id);
            return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>')
                            ->make(true);

        }


    }


    public function resolvedCasesList()
    {

        if (\Auth::user()->role == 1 || \Auth::user()->role == 3) {

        $cases = CaseReport::where('status','=','Resolved');
        return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>')
                            ->make(true);
        }
        else {


            $cases = CaseReport::where('status','=','Resolved')
                                ->where('user','=',\Auth::user()->id);
            return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>')
                            ->make(true);

        }
    }

    public function pendingReferralCasesList()
    {

        $cases = \DB::table('cases')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->where('cases.status','=',1);
        return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>')
                            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function acceptCase($id)
    {

         $caseOwnerObj = CaseOwner::where("caseId",'=',$id)
                                   ->where("user",'=',\Auth::user()->id)
                                   ->first();

         $numberCases   = CaseReport::where('user','=',\Auth::user()->id)->get();



        if (sizeof($caseOwnerObj) > 0)
        {
            $caseOwnerObj->accept = 1;
            $caseOwnerObj->save();
            $caseActivity              = New CaseActivity();
            $caseActivity->caseId      = $id;
            $caseActivity->user        = \Auth::user()->id;
            $caseActivity->addressbook = 0;
            $caseActivity->note        = "Case Accepted by ".\Auth::user()->name.' '.\Auth::user()->surname;
            $caseActivity->save();

            $case = CaseReport::find($id);
            if($case->status == "Pending") {
                $case->status      = "Actioned";
                $case->accepted_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                $case->save();
            }

            $caseOwners = CaseOwner::where("caseId",'=',$id)
                                     ->where("user","<>",\Auth::user()->id)
                                     ->get();

            foreach ($caseOwners as $owner) {

                if ($owner->addressbook == 1) {

                    $user = AddressBook::find($owner->user);

                }
                else {

                    $user = User::find($owner->user);


                }

                $data = array(
                                    'name'   =>$user->name,
                                    'caseID' =>$id,
                                    'acceptedBy' => \Auth::user()->name.' '.\Auth::user()->surname,
                                );


                \Mail::send('emails.acceptCase',$data, function($message) use ($user)
                {
                    $message->from('info@siyaleader.net', 'Siyaleader');
                    $message->to($user->username)->subject("Siyaleader Notification - New Case Accepted: ");

               });

            }



        }

            return "ok";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function captureCase(Request $request)
    {

        $reporter     = $request['caseReporter'];
        $caseSeverity = $request['caseSeverity'];
        $userObj      = User::where('username','=',$reporter)->first();


        if(sizeof($userObj) <= 0 )
        {
            $userAddressbookObj = addressbook::where('email','=',$reporter)->first();
        }

        $user        = (sizeof($userObj) <= 0)? $userAddressbookObj->id:$userObj->id;
        $addressbook = (sizeof($userObj) <= 0)? 1:0;
        $userName    = (sizeof($userObj) <= 0)? $userAddressbookObj->FirstName:$userObj->name;
        $userSurname = (sizeof($userObj) <= 0)? $userAddressbookObj->Surname:$userObj->surname;
        $userEmail   = (sizeof($userObj) <= 0)? $userAddressbookObj->email:$userObj->username;
        $cell        = (sizeof($userObj) <= 0)? $userAddressbookObj->cellphone:$userObj->email;


        $caseDescription   = $request['caseDescription'];
        $precinctObj       = Municipality::where('slug','=',$request['caseMunicipality'])->first();
        $categoryObj       = Category::where('slug','=',$request['caseCategory'])->first();
        $subCategoryObj    = SubCategory::where('slug','=',$request['caseSubCategory'])->first();

        if($request['caseSubSubCategory'] > 0)
        {
            $subSubCategoryObj = SubSubCategory::where('slug','=',$request['caseSubSubCategory'])->first();
            $subSubCategory    = $subSubCategoryObj->id;
        }
        else{

            $subSubCategory    = 0;
        }


       $gps                       = explode(",",$request['GPS']);
       $caseObj                   = new CaseReport();
       $caseObj->description      = htmlentities($caseDescription);
       $caseObj->user             = \Auth::user()->id;
       $caseObj->reporter         = $user;
       $caseObj->addressbook      = $addressbook;
       $caseObj->precinct         = $precinctObj->id;
       $caseObj->category         = $categoryObj->id;
       $caseObj->sub_category     = $subCategoryObj->id;
       $caseObj->sub_sub_category = $subSubCategory;
       $caseObj->gps_lat          = $gps[0];
       $caseObj->gps_lng          = $gps[1];
       $caseObj->severity         = $caseSeverity;
       $caseObj->status           = "Pending";
       $caseObj->save();

       $data = array(
                'name'      =>$userName,
                'caseID'    =>$caseObj->id,
                'caseDesc'  =>$caseObj->description
        );

        $caseOwner              = new CaseOwner();
        $caseOwner->user        = $user;
        $caseOwner->caseId      = $caseObj->id;
        $caseOwner->type        = 0;
        $caseOwner->active      = 1;
        $caseOwner->save();


        \Mail::send('emails.sms',$data, function($message) use ($userEmail) {
            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($userEmail)->subject("Siyaleader Notification - New Case Reported:");

        });

        if ($caseSeverity <= 4) {

               $severityData = array(
                    'severity'  => $caseObj->severity ,
                    'name'      => $userName .' '.$userSurname,
                    'cell'      => $cell,
                    'category'  => $categoryObj->name,
                    'caseId'    => $caseObj->id
                );

                \Mail::send('emails.severity',$severityData, function($message) {

                    $message->from('info@siyaleader.net', 'Siyaleader');
                    $message->to('gavin@squeakytakkie.co.za')->subject("SEVERE");

                });


                $criticalTeam = CriticalTeam::all();

                foreach ($criticalTeam as $critical) {

                        $caseOwner         = new CaseOwner();
                        $caseOwner->user   = $critical->user;
                        $caseOwner->caseId = $caseObj->id;
                        $caseOwner->type   = 5;//Critical Team
                        $caseOwner->active = 1;
                        $caseOwner->save();

                        \Mail::send('emails.severity',$severityData, function($message) use ($critical) {

                            $userObj = User::find($critical->user);
                            $message->from('info@siyaleader.net', 'Siyaleader');
                            $message->to($userObj->username)->subject("Siyaleader Notification - New Severe Case Reported:");

                        });

                }


        }


            if ($subSubCategory > 0)
            {
                 $subSubCatResponders = CaseResponder::where('sub_sub_category','=',$subSubCategory)->first();


                    if (sizeof($subSubCatResponders) > 0)
                    {

                        if($subSubCatResponders->firstResponder)
                        {
                            $firstResponderUser = User::find($subSubCatResponders->firstResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subSubCatResponders->firstResponder ;
                            $caseOwner->caseId = $caseObj->id;
                            $caseOwner->type   = 1;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                             $data = array(
                                    'name'   =>$firstResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                                );


                            \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($firstResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subSubCatResponders->secondResponder)
                        {
                            $secondResponderUser = User::find($subSubCatResponders->secondResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subSubCatResponders->secondResponder;
                            $caseOwner->caseId = $caseObj->id;
                            $caseOwner->type   = 2;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$secondResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($secondResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($secondResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subSubCatResponders->thirdResponder)
                        {
                            $thirdResponderUser = User::find($subSubCatResponders->thirdResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subSubCatResponders->thirdResponder;
                            $caseOwner->caseId = $caseObj->id;
                            $caseOwner->type   = 3;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$thirdResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($thirdResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($thirdResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }
                    }
            }


            if ($subSubCategory == 0)
            {



                  $subCatResponders = CaseResponder::where('sub_category','=',$subCategoryObj->id)->first();


                    if (sizeof($subCatResponders) > 0)
                    {

                        if($subCatResponders->firstResponder)
                        {
                            $firstResponderUser = User::find($subCatResponders->firstResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subCatResponders->firstResponder ;
                            $caseOwner->caseId = $caseObj->id;
                            $caseOwner->type   = 1;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                             $data = array(
                                    'name'   =>$firstResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                                );


                            \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($firstResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subCatResponders->secondResponder)
                        {
                            $secondResponderUser = User::find($subCatResponders->secondResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subCatResponders->secondResponder;
                            $caseOwner->caseId = $caseObj->id;
                            $caseOwner->type   = 2;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$secondResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($secondResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($secondResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subCatResponders->thirdResponder)
                        {
                            $thirdResponderUser = User::find($subCatResponders->thirdResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subCatResponders->thirdResponder;
                            $caseOwner->caseId = $caseObj->id;
                            $caseOwner->type   = 3;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$thirdResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($thirdResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($thirdResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }
                }











            }

               return redirect()->back();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function escalate(Request $request)
    {

        $addresses     = explode(',',$request['addresses']);
        $caseOwners    = CaseOwner::where('caseId','=',$request['caseID'])->get();

        foreach ($caseOwners as $caseOwner) {

            $user =  User::find($caseOwner->user);
            $data = array(

                'name'          => $user->name,
                'caseID'        => $request['caseID'],
                'content'       => $request['message'],
                'executor'      => \Auth::user()->name.' '.\Auth::user()->surname,
            );


            \Mail::send('emails.caseEscalation',$data, function($message) use ($user)
            {
                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to($user->username)->subject("Siyaleader Notification - Case Referred: " );

            });

        }


        foreach ($addresses as $address) {

            $user = User::where('username','=',$address)->first();

            if(sizeof($user) <= 0 )
            {
                 $userAddressbook = addressbook::where('email','=',$address)->first();
            }

            $name        = (sizeof($user) <= 0)? $userAddressbook->FirstName:$user->name;
            $surname     = (sizeof($user) <= 0)? $userAddressbook->Surname:$user->surname;
            $to          = (sizeof($user) <= 0)? $userAddressbook->id:$user->id;
            $type        = (sizeof($user) <= 0)? 1:0;
            $addressbook = (sizeof($user) <= 0)? 1:0;

            $data = array(
                'name'    => $name,
                'caseID'  => $request['caseID'],
                'content' => $request['message']
            );


            $caseActivity              = New CaseActivity();
            $caseActivity->caseId      = $request['caseID'];
            $caseActivity->user        = $to;
            $caseActivity->addressbook = $addressbook;
            $caseActivity->note        = "Case Referred to ".$name ." ".$surname." by ".\Auth::user()->name.' '.\Auth::user()->surname;
            $caseActivity->save();


            \Mail::send('emails.caseEscalated',$data, function($message) use ($address)
            {
                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to($address)->subject("Siyaleader Notification - Case Referred: " );

            });

            $caseEscalationObj          = New CaseEscalator();
            $caseEscalationObj->caseId  = $request['caseID'];
            $caseEscalationObj->from    = \Auth::user()->id;
            $caseEscalationObj->to      = $to;
            $caseEscalationObj->type    = $type;
            $caseEscalationObj->message = $request['message'];
            $caseEscalationObj->save();

            $caseOwnerObj              = New CaseOwner();
            $caseOwnerObj->caseId      = $request['caseID'];
            $caseOwnerObj->user        = $to;
            $caseOwnerObj->type        = 4 ;
            $caseOwnerObj->addressbook = $addressbook;
            $caseOwnerObj->save();

        }


        return "ok";

    }

    public function allocate(Request $request){

        $responders     = $request['responders'];

        foreach ($responders as $responder) {

            $caseOwner          = new CaseOwner();
            $caseOwner->case_id = $request['caseID'];
            $caseOwner->user    = $responder;
            $caseOwner->type    = 1;
            $caseOwner->save();


        }

        $objCase              = CaseReport::find($request['caseID']);
        $objCaseStatus        = CaseStatus::where('name','=','Referred')->first();
        $objCase->status      = $objCaseStatus->id;
        $objCase->referred_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $objCase->updated_by  = \Auth::user()->id;
        $objCase->save();


        return 'ok';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function closeCase($id)
    {

      $case = CaseReport::find($id);
      $case->status      = "Resolved";
      $case->resolved_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
      $case->save();

      $caseActivity              = New CaseActivity();
      $caseActivity->caseId      = $id;
      $caseActivity->user        = \Auth::user()->id;
      $caseActivity->addressbook = 0;
      $caseActivity->note        = \Auth::user()->name.' '.\Auth::user()->surname ." closed case";
      $caseActivity->save();

      $data = array (
                            'name'      => \Auth::user()->name,
                            'caseID'    => $id,
                            'content'   => $case->description,
                            'executor'  => \Auth::user()->name.' '.\Auth::user()->surname,
                    );

      $user   = User::find($case->reporter);

       if(sizeof($user) <= 0 ) {

           $userAddressbook = addressbook::where('id','=',$case->reporter)->first();
       }

       $email  = (sizeof($user) <= 0)? $userAddressbook->email : $user->username;

      \Mail::send('emails.caseClosed',$data, function($message) use ($email) {

            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($email)->subject("Siyaleader Notification - Case Closed: " );

        });

       return "ok";

    }


    public function requestCaseClosure(Request $request)
    {
        $case = CaseReport::find($request['caseID']);
        $case->status = "Pending Closure";
        $case->save();

        $caseActivity              = New CaseActivity();
        $caseActivity->caseId      = $request['caseID'];
        $caseActivity->user        = \Auth::user()->id;
        $caseActivity->addressbook = 0;
        $caseActivity->note        = \Auth::user()->name.' '.\Auth::user()->surname ." requested case closure";
        $caseActivity->save();

        $caseAdministrators    = User::where('role','=',1)
                                    ->orWhere('role','=',3)
                                    ->get();


        foreach ($caseAdministrators as $caseAdmin) {


             $data = array(
                            'name'      => $caseAdmin->name,
                            'caseID'    => $case->id,
                            'content'   => $case->description,
                            'note'      => $request['caseNote'],
                            'requestor' => \Auth::user()->name.' '.\Auth::user()->surname,
                            );


            \Mail::send('emails.requestCaseClosure',$data, function($message) use ($caseAdmin) {

                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to($caseAdmin->username)->subject("Siyaleader Notification - Request for Case Closure: " );

            });

        }


        return "Case Closed";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $destinationFolder = 'files/case_'.$id;

        if(!\File::exists($destinationFolder)) {
             $createDir         = \File::makeDirectory($destinationFolder,0777,true);
        }

        $caseObj = CaseReport::find($id);

        if($caseObj->sub_sub_category == 0)
        {

            $case = \DB::table('cases')
            ->join('municipalities', 'cases.municipality', '=', 'municipalities.id')
            ->join('districts', 'cases.district', '=', 'districts.id')
            ->join('wards', 'cases.ward', '=', 'wards.id')
            ->join('categories', 'cases.category', '=', 'categories.id')
            ->join('sub_categories', 'cases.sub_category', '=', 'sub_categories.id')
            ->join('users', 'cases.user', '=', 'users.id')
            ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
            ->join('cases_priorities', 'cases.priority', '=', 'cases_priorities.id')
            ->where('cases.id','=',$id)
            ->select(\DB::raw( "
                                    cases.id,
                                    cases.description,
                                    cases.created_at,
                                    cases.img_url,
                                    cases.house_holder_id,
                                    CONCAT(users.`name`, ' ', users.`surname`) as capturer,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporter,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as household,
                                    (select `created_at` from `cases_activities` where `case_id` = `cases`.`id` order by `created_at` desc limit 1) as last_at,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterCell,
                                     IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as householdCell,
                                    municipalities.name as municipality,
                                    districts.name as district,
                                    cases_statuses.name as status,
                                    wards.name as ward,
                                    cases_priorities.name as priority,
                                    categories.name as category,
                                    `sub_categories`.name as sub_category,
                                    `cases`.sub_sub_category as sub_sub_category "
                            )
                    )
            ->get();


        }

        else{

            $case = \DB::table('cases')
            ->join('municipalities', 'cases.precinct', '=', 'municipalities.id')
            ->join('categories', 'cases.category', '=', 'categories.id')
            ->join('sub_categories', 'cases.sub_category', '=', 'sub_categories.id')
            ->join('sub_sub_categories', 'cases.sub_sub_category', '=', 'sub_sub_categories.id')
            ->join('users', 'cases.user', '=', 'users.id')
            ->where('cases.id','=',$id)
            ->select(\DB::raw("
                                cases.id,
                                cases.description,
                                cases.created_at,
                                cases.status,
                                cases.img_url,CONCAT(users.`name`, ' ', users.`surname`) as capturer,
                                 IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`FirstName`, ' ', `Surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporter,
                                (select `created_at` from `caseActivities` where `caseId` = `cases`.`id` order by `created_at` desc limit 1) as last_at,
                                users.email as reporterCell,
                                municipalities.name as department,
                                categories.name as category,
                                `sub_categories`.name as sub_category,
                                `sub_sub_categories`.name as sub_sub_category

                            "))
            ->get();



        }

        return $case;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function captureCaseUpdate(CaseRequest $request)
    {

        $houseHolderId = $request['hseHolderId'];
        $userRole      = UserRole::where('name','=','House Holder')->first();



        if ( $houseHolderId < 1 ) {

            $user               = New User();
            $user->role         = $userRole->id;
            $user->name         = $request['name'];
            $user->surname      = $request['surname'];
            $user->cellphone    = $request['cellphone'];
            $user->id_number    = $request['id_number'];
            $user->position     = $request['position'];
            $user->title        = $request['title'];
            $user->house_number = $request['house_number'];
            $user->email        = $request['cellphone']."@siyaleader.net";
            $user->created_by   = \Auth::user()->id;
            $language           = Language::where('slug','=',$request['language'])->first();
            $user->language     = $language->id;
            $province           = Province::where('slug','=',$request['province'])->first();
            $user->province     = $province->id;
            $district           = District::where('slug','=',$request['district'])->first();
            $user->district     = $district->id;
            $municipality       = Municipality::where('slug','=',$request['municipality'])->first();
            $user->municipality = $municipality->id;
            $ward               = Ward::where('slug','=',$request['ward'])->first();
            $user->ward         = $ward->id;
            $user->save();

        }

        $casePriority       = CasePriority::where('slug','=',$request['priority'])->first();
        $case               = CaseReport::find($request['caseID']);
        $case->description  = $request['description'];
        $case->priority     = $casePriority->id;
        $case->updated_by   = \Auth::user()->id;
        $case->updated_at   = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $case->save();


        return 'ok';

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
