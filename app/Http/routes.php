<?php

use App\Province;
use App\District;
use App\Municipality;
use App\Department;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\CaseReport;
use App\Online;
use App\User;
use App\Message;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| HOME ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('home', ['middleware' => 'auth', 'uses' => 'HomeController@index']);


/*
|--------------------------------------------------------------------------
| END HOME ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| ROLES ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('list-roles', ['middleware' => 'auth', function()
{
    return view('roles.list');
}]);
Route::get('roles-list', ['middleware' => 'auth', 'uses' => 'RolesController@index']);
Route::get('roles/{id}', ['middleware' => 'auth', 'uses' => 'RolesController@edit']);


Route::post('add-role', ['middleware' => 'auth', 'uses' => 'RolesController@store']);
Route::post('update-role', ['middleware' => 'auth', 'uses' => 'RolesController@update']);

/*
|--------------------------------------------------------------------------
| END ROLES ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| USERS ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('list-users', ['middleware' => 'auth', function()
{
    return view('users.list');
}]);


Route::get('users-list', ['middleware' => 'auth', 'uses' => 'UserController@index']);

Route::get('getResponder', ['middleware' => 'auth', 'uses' => 'UserController@responder']);

Route::get('add-user', ['middleware' => 'auth', function()
{
    return view('users.registration');
}]);


Route::get('/', function () {
    return view('auth.login');
});

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('users/{id}', ['middleware' => 'auth', 'uses' => 'UserController@edit']);

Route::post('updateUser', ['middleware' => 'auth', 'uses' => 'UserController@update']);

Route::get('getHouseHolder', ['middleware' => 'auth', 'uses' => 'UserController@getHouseHolder']);


/*
|--------------------------------------------------------------------------
| END USERS ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| DEPARTMENTS ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-departments', ['middleware' => 'auth', function()
{
    return view('departments.list');
}]);

Route::get('departments-list', ['middleware' => 'auth', 'uses' => 'DepartmentController@index']);
Route::get('departments/{id}', ['middleware' => 'auth', 'uses' => 'DepartmentController@edit']);

Route::post('updateDepartment', ['middleware' => 'auth', 'uses' => 'DepartmentController@update']);
Route::post('addDepartment', ['middleware' => 'auth', 'uses' => 'DepartmentController@store']);


/*
|--------------------------------------------------------------------------
| END DEPARTMENTS ROUTING
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| STATUSES ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-statuses', ['middleware' => 'auth', function()
{
    return view('statuses.list');
}]);

Route::get('statuses-list', ['middleware' => 'auth', 'uses' => 'CasesStatusesController@index']);
Route::get('statuses/{id}', ['middleware' => 'auth', 'uses' => 'CasesStatusesController@edit']);
Route::post('updateCaseStatus', ['middleware' => 'auth', 'uses' => 'CasesStatusesController@update']);
Route::post('addCaseStatus', ['middleware' => 'auth', 'uses' => 'CasesStatusesController@store']);


/*
|--------------------------------------------------------------------------
| END STATUSES ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| PROVINCES ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-provinces', ['middleware' => 'auth', function()
{
    return view('provinces.list');
}]);

Route::get('provinces-list', ['middleware' => 'auth', 'uses' => 'ProvincesController@index']);
Route::get('provinces/{id}', ['middleware' => 'auth', 'uses' => 'ProvincesController@edit']);
Route::post('updateProvince', ['middleware' => 'auth', 'uses' => 'ProvincesController@update']);
Route::post('addProvince', ['middleware' => 'auth', 'uses' => 'ProvincesController@store']);


/*
|--------------------------------------------------------------------------
| END PROVINCES ROUTING
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| DISTRICS ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-districts/{province}', ['middleware' => 'auth', function($province)
{
    $provinceObj = Province::find($province);
    return view('districts.list',compact('provinceObj'));
}]);

Route::get('districts-list/{id}', ['middleware' => 'auth', 'uses' => 'DistricsController@index']);
Route::get('districts/{id}', ['middleware' => 'auth', 'uses' => 'DistricsController@edit']);
Route::post('updateDistrict', ['middleware' => 'auth', 'uses' => 'DistricsController@update']);
Route::post('addDistrict', ['middleware' => 'auth', 'uses' => 'DistricsController@store']);


/*
|--------------------------------------------------------------------------
| END DISTRICS ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| MUNICIPALITIES ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-municipalities/{district}', ['middleware' => 'auth', function($district)
{
  $districtObj   = District::find($district);
  $provinceObj  = Province::find($districtObj->province);
  return view('municipalities.list',compact('districtObj','provinceObj'));
}]);


Route::get('municipalities-list/{id}', ['middleware' => 'auth', 'uses' => 'MunicipalitiesController@index']);
Route::get('municipalities/{id}', ['middleware' => 'auth', 'uses' => 'MunicipalitiesController@edit']);

Route::post('updateMunicipality', ['middleware' => 'auth', 'uses' => 'MunicipalitiesController@update']);
Route::post('addMunicipality', ['middleware' => 'auth', 'uses' => 'MunicipalitiesController@store']);

/*
|--------------------------------------------------------------------------
| END MUNICIPALITIES ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| WARDS ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-wards/{municipality}', ['middleware' => 'auth', function($municipality)
{
  $municipalityObj  = Municipality::find($municipality);
  $districtObj      = District::find($municipalityObj->district);
  $provinceObj      = Province::find($districtObj->province);
  return view('wards.list',compact('districtObj','municipalityObj','provinceObj'));
}]);


Route::get('wards-list/{id}', ['middleware' => 'auth', 'uses' => 'WardsController@index']);
Route::get('wards/{id}', ['middleware' => 'auth', 'uses' => 'WardsController@edit']);

Route::post('updateWard', ['middleware' => 'auth', 'uses' => 'WardsController@update']);
Route::post('addWard', ['middleware' => 'auth', 'uses' => 'WardsController@store']);

/*
|--------------------------------------------------------------------------
| END WARDS ROUTING
|--------------------------------------------------------------------------
|
*/






/*
|--------------------------------------------------------------------------
| CATEGORIES ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('list-categories/{department}', ['middleware' => 'auth', function($department)
{
    $deptObj = Department::find($department);
    return view('categories.list',compact('deptObj'));
}]);


Route::get('categories/{id}', ['middleware' => 'auth', 'uses' => 'CategoriesController@edit']);
Route::get('categories-list/{id}', ['middleware' => 'auth', 'uses' => 'CategoriesController@index']);
Route::post('updateCategory', ['middleware' => 'auth', 'uses' => 'CategoriesController@update']);
Route::post('addCategory', ['middleware' => 'auth', 'uses' => 'CategoriesController@store']);


/*
|--------------------------------------------------------------------------
| END CATEGORIES ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| SUB-CATEGORIES ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('list-sub-categories/{category}', ['middleware' => 'auth', function($category)
{
  $catObj   = Category::find($category);
  $deptName = Department::find($catObj->department);
  return view('subcategories.list',compact('catObj','deptName'));
}]);

Route::get('subcategories/{id}', ['middleware' => 'auth', 'uses' => 'SubCategoriesController@edit']);
Route::get('sub-categories-list/{id}', ['middleware' => 'auth', 'uses' => 'SubCategoriesController@index']);
Route::post('updateSubCategory', ['middleware' => 'auth', 'uses' => 'SubCategoriesController@update']);
Route::post('addSubCategory', ['middleware' => 'auth', 'uses' => 'SubCategoriesController@store']);

/*
|--------------------------------------------------------------------------
| END SUB-CATEGORIES ROUTING
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| SUB-SUB-CATEGORIES ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('list-sub-sub-categories/{sub_category}', ['middleware' => 'auth', function($sub_category)
{
    $subCatObj = SubCategory::find($sub_category);
    $catObj    = Category::find($subCatObj->category);
    $deptObj   = Department::find($catObj->department);
    return view('subsubcategories.list',compact('subCatObj','deptObj','catObj'));
}]);

Route::get('sub-sub-categories-list/{id}', ['middleware' => 'auth', 'uses' => 'SubSubCategoriesController@index']);
Route::get('subsubcategories/{id}', ['middleware' => 'auth', 'uses' => 'SubSubCategoriesController@edit']);
Route::post('addSubSubCategory', ['middleware' => 'auth', 'uses' => 'SubSubCategoriesController@store']);
Route::post('updateSubSubCategory', ['middleware' => 'auth', 'uses' => 'SubSubCategoriesController@update']);



/*
|--------------------------------------------------------------------------
| END SUB-SUB-CATEGORIES ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| CASES ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('cases-list/{id}', ['middleware' => 'auth', 'uses' => 'CasesController@index']);
Route::get('case/{id}', ['middleware' => 'auth', 'uses' => 'CasesController@edit']);
Route::post('escalateCase', ['middleware' => 'auth', 'uses' => 'CasesController@escalate']);
Route::get('acceptCase/{id}', ['middleware' => 'auth', 'uses' => 'CasesController@acceptCase']);
Route::post('addCaseForm', ['middleware' => 'auth', 'uses' => 'CasesController@captureCase']);
Route::get('closeCase/{id}', ['middleware' => 'auth', 'uses' => 'CasesController@closeCase']);
Route::post('requestCaseClosure', ['middleware' => 'auth', 'uses' => 'CasesController@requestCaseClosure']);
Route::get('request-cases-closure-list', ['middleware' => 'auth', 'uses' => 'CasesController@requestCaseClosureList']);
Route::get('resolved-cases-list', ['middleware' => 'auth', 'uses' => 'CasesController@resolvedCasesList']);
Route::get('pending-referral-cases-list', ['middleware' => 'auth', 'uses' => 'CasesController@pendingReferralCasesList']);
Route::post('captureCaseUpdate', ['middleware' => 'auth', 'uses' => 'CasesController@captureCaseUpdate']);


/*
|--------------------------------------------------------------------------
| END CASES ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| ADDRESSBOOK ROUTING
|--------------------------------------------------------------------------
|
*/
Route::get('addressbook-list/{id}', ['middleware' => 'auth', 'uses' => 'AddressBookController@index']);
Route::post('addContact', ['middleware' => 'auth', 'uses' => 'AddressBookController@store']);
Route::get('getContacts', ['middleware' => 'auth', 'uses' => 'AddressBookController@show']);


/*
|--------------------------------------------------------------------------
| END ADDRESSBOOK ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| RELATIONSHIP ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| POSITIONS ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('list-relationships', ['middleware' => 'auth', function()
{
    return view('relationships.list');

}]);

Route::get('relationships-list', ['middleware' => 'auth', 'uses' => 'RelationshipController@index']);
Route::get('relationships/{id}', ['middleware' => 'auth', 'uses' => 'RelationshipController@edit']);
Route::post('updateRelationship', ['middleware' => 'auth', 'uses' => 'RelationshipController@update']);
Route::post('addRelationship', ['middleware' => 'auth', 'uses' => 'RelationshipController@store']);


/*
|--------------------------------------------------------------------------
| END POSITIONS ROUTING
|--------------------------------------------------------------------------
|
*/






/*
|--------------------------------------------------------------------------
| END RELATIONSHIP ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| RESPONDERS ROUTING
|--------------------------------------------------------------------------
|
*/
  Route::get('getsubSubResponders/{id}', ['middleware' => 'auth', 'uses' => 'RespondersController@subSubResponder']);
  Route::post('addSubSubCategoryResponder', ['middleware' => 'auth', 'uses' => 'RespondersController@storeSubSubResponder']);
  Route::get('getSubResponders/{id}', ['middleware' => 'auth', 'uses' => 'RespondersController@subResponder']);
  Route::post('addSubCategoryResponder', ['middleware' => 'auth', 'uses' => 'RespondersController@storeSubResponder']);
  Route::get('caseResponders-list/{id}', ['middleware' => 'auth', 'uses' => 'RespondersController@index']);






/*
|--------------------------------------------------------------------------
| END RESPONDERS ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| CASE NOTES ROUTING
|--------------------------------------------------------------------------
|
*/
  Route::get('caseNotes-list/{id}', ['middleware' => 'auth', 'uses' => 'CaseNotesController@index']);
  Route::post('addCaseNote', ['middleware' => 'auth', 'uses' => 'CaseNotesController@store']);


/*
|--------------------------------------------------------------------------
| END CASE NOTES ROUTING
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| CASE FILES ROUTING
|--------------------------------------------------------------------------
|
*/

  Route::post('addCaseFile', ['middleware' => 'auth', 'uses' => 'CaseFilesController@store']);
  Route::get('fileDescription/{id}/{name}', ['middleware' => 'auth', 'uses' => 'CaseFilesController@index']);


/*
|--------------------------------------------------------------------------
| END CASE FILES ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| CASE ACTIVITIES ROUTING
|--------------------------------------------------------------------------
|
*/

  Route::get('caseActivities-list/{id}', ['middleware' => 'auth', 'uses' => 'CaseActivitiesController@index']);

/*
|--------------------------------------------------------------------------
| END CASE ACTIVITIES ROUTING
|--------------------------------------------------------------------------
|
*/






/*
|--------------------------------------------------------------------------
| POSITIONS ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('list-positions', ['middleware' => 'auth', function()
{
    return view('positions.list');
}]);

Route::get('positions-list', ['middleware' => 'auth', 'uses' => 'PositionsController@index']);
Route::get('positions/{id}', ['middleware' => 'auth', 'uses' => 'PositionsController@edit']);
Route::post('updatePosition', ['middleware' => 'auth', 'uses' => 'PositionsController@update']);
Route::post('addPosition', ['middleware' => 'auth', 'uses' => 'PositionsController@store']);


/*
|--------------------------------------------------------------------------
| END POSITIONS ROUTING
|--------------------------------------------------------------------------
|
*/





/*
|--------------------------------------------------------------------------
| MAP ACTIVITIES ROUTING
|--------------------------------------------------------------------------
|
*/

  Route::get('map', ['middleware' => 'auth', 'uses' => 'MapController@index']);


/*
|--------------------------------------------------------------------------
| END MAP ACTIVITIES ROUTING
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| CASE OWNERS ROUTING
|--------------------------------------------------------------------------
|
*/

  Route::get('caseOwner/{user}/{id}', ['middleware' => 'auth', 'uses' => 'CaseOwnerController@index']);


/*
|--------------------------------------------------------------------------
| CASE OWNERS ROUTING
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
|  PASSWORD  ROUTING
|--------------------------------------------------------------------------
|
*/


  Route::get('resend_password/{id}', 'UserController@resendPassword');
  // Password reset link request routes...
  Route::get('password/email', 'Auth\PasswordController@getEmail');
  Route::post('password/email', 'Auth\PasswordController@postEmail');


  // Password reset routes...
  Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
  Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
|--------------------------------------------------------------------------
|  END PASSWORD  ROUTING
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| REPORTS ROUTING
|--------------------------------------------------------------------------
|
*/

Route::get('reports', ['middleware' => 'auth', function()
{
    return view('reports.list');
}]);

Route::get('reports-list', ['middleware' => 'auth', 'uses' => 'ReportsController@index']);
Route::post('filterReports', ['middleware' => 'auth', 'uses' => 'ReportsController@show']);



/*
|--------------------------------------------------------------------------
| END REPORTS ROUTING
|--------------------------------------------------------------------------
|
*/



$router->resource('users','UserController');

Route::get('/api/dropdown/{to}/{from}', function($to,$from){
$name      = Input::get('option');

if ($from == 'province')
{
  $object = Province::where('slug','=',$name)->first();
}
if ($from == 'district')
{
  $object = District::where('slug','=',$name)->first();
}

if ($from == 'municipality')
{
  $object = Municipality::where('slug','=',$name)->first();
}

$listing = DB::table($to)->where($from,$object->id)->lists('name', 'slug');

return $listing;

});

Route::get('/api/dropdownDepartment/{to}/{from}', function($to,$from){

$name      = Input::get('option');

if ($from == 'department')
{
  $object = Department::where('slug','=',$name)->first();
  $listing = DB::table('categories')
              ->where('department','=',$object->id)
              ->lists('name', 'slug');
}

return $listing;
});

Route::get('/api/dropdownCategory/{to}/{from}', function($to,$from){

$name      = Input::get('option');

if ($from == 'category')
{
  $object = Category::where('slug','=',$name)->first();
}
else{

 $object = SubCategory::where('slug','=',$name)->first();

}

if ($from == 'category')
{
  $listing = DB::table('sub-categories')
              ->where('category','=',$object->id)
              ->lists('name', 'slug');

}
else {

 $listing = DB::table('sub-sub-categories')
              ->where('sub_category','=',$object->id)
              ->lists('name', 'slug');
}

return $listing;
});



Route::post('postChat', ['middleware' => 'auth', 'uses' => 'ChatController@postChat']);


Event::listen('auth.login', function()
{
    $user               = User::find(\Auth::user()->id);
    $user->availability = 1;
    $user->last_login   =  new DateTime;
    $user->save();
});

Event::listen('auth.logout', function()
{
    $user = User::find(\Auth::user()->id);
    $user->availability = 0;
    $user->last_logout  =  new DateTime;
    $user->save();
});



Route::get('/getLoggedInUsers', function(){

   $allUsers = User::where('id','<>',\Auth::user()->id)->orderBy('availability','desc')->get();
   $html     = "";

   foreach ($allUsers as $user) {

       $availability = ($user->availability == 1)? "<i class='fa fa-circle-o status m-r-5'></i>":"<i class='fa fa-circle-o offline m-r-5'></i>";
       $html .=  "<div class='media'>";
       $html .=  "<a href='#' onClick='chatStart(this)' class='chatWith' data-userid = '$user->id' data-names = '$user->name $user->surname'> <img class='pull-left' src='img/profile-pics/7.png' width='30' alt=''></a>";
       $html .=  "<div class='media-body'>";
       $html .=  "<span class='t-overflow p-t-5'>$user->name  $user->surname $availability</span>";
       $html .=  "</div>";
       $html .=  "</div>";

  }
   return $html;

});



/*
|--------------------------------------------------------------------------
| CASE MESSAGE ROUTING
|--------------------------------------------------------------------------
|
*/

  Route::post('addCaseMessage', ['middleware' => 'auth', 'uses' => 'MessageController@store']);

  Route::get('/getOfflineMessage', function(){

   $offlineMessages = Message::where('to','=',\Auth::user()->id)
                                ->where('online','=',0)
                                ->orderBy('created_at','desc')
                                ->take(5)
                                ->get();

   $html     = "";

   foreach ($offlineMessages as $message) {

       $user = User::where('id','=',$message->from)->first();
       $read = ($message->read == 0)? "<span class='label label-danger'>New</span>":"";
       $html .=  "<div class='media'>";
       $html .=  "<div class='pull-left'>";
       $html .=  "<a href='#' onClick='chatStart(this)'> <img class='pull-left' src='img/profile-pics/7.png' width='30' alt=''></a>";
       $html .=  "</div>";
       $html .=  "<div class='media-body'>";
       $html .=  "<small class='text-muted'>$user->name  $user->surname - $message->created_at</small> $read<br>";
       $html .=  "<a class='t-overflow' href='message-detail/$message->id'>$message->message .Ref:Case ID $message->caseId</a>";
       $html .=  "</div>";
       $html .=  "</div>";

  }
   return $html;

});

Route::get('message-detail/{id}','MessageController@edit');
Route::get('all-messages','MessageController@index');


/*
|--------------------------------------------------------------------------
| END CASE MESSAGE ROUTING
|--------------------------------------------------------------------------
|
*/








