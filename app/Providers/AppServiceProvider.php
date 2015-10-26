<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Position;
use App\Department;
use App\Province;
use App\District;
use App\Municipality;
use App\Ward;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\CaseReport;
use App\User;
use App\Relationship;
use App\addressbook;
use App\Message;
use App\UserRole;
use App\Title;
use App\Language;
use App\CaseStatus;
use App\CasePriority;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\Schema::hasTable('positions'))
        {
            $positions          = Position::all();
            $selectPositions    = array();
            $selectPositions[0] = "Select / All";

            foreach ($positions as $position) {
               $selectPositions[$position->slug] = $position->name;
            }

             \View::share('selectPositions',$selectPositions);

        }


        if (\Schema::hasTable('cases_priorities'))
        {
            $priorities          = CasePriority::all();
            $selectPriorities    = array();
            $selectPriorities[0] = "Select / All";

            foreach ($priorities as $priority) {

               $selectPriorities[$priority->slug] = $priority->name;
            }

             \View::share('selectPriorities',$selectPriorities);

        }

        if (\Schema::hasTable('titles'))
        {
            $titles          = Title::all();
            $selectTitles    = array();
            $selectTitles[0] = "Select / All";

            foreach ($titles as $title) {
               $selectTitles[$title->slug] = $title->name;
            }

             \View::share('selectTitles',$selectTitles);

        }

         if (\Schema::hasTable('languages'))
        {
            $languages          = Language::all();
            $selectLanguages    = array();
            $selectLanguages[0] = "Select / All";

            foreach ($languages as $language) {
               $selectLanguages[$language->slug] = $language->name;
            }

             \View::share('selectLanguages',$selectLanguages);

        }



         if (\Schema::hasTable('departments'))
        {
            $departments          = Department::all();
            $selectDepartments    = array();
            $selectDepartments[0] = "Select / All";

            foreach ($departments as $department) {
               $selectDepartments[$department->slug] = $department->name;
            }

             \View::share('selectDepartments',$selectDepartments);

        }

        if (\Schema::hasTable('users_roles'))
        {
            $roles          = UserRole::all();
            $selectRoles    = array();
            $selectRoles[0] = "Select / All";

            foreach ($roles as $role) {
               $selectRoles[$role->slug] = $role->name;
            }

             \View::share('selectRoles',$selectRoles);

        }


        if (\Schema::hasTable('provinces'))
        {
            $provinces          = Province::all();
            $selectProvinces    = array();
            $selectProvinces[0] = "Select / All";

            foreach ($provinces as $Province) {
               $selectProvinces[$Province->slug] = $Province->name;
            }

             \View::share('selectProvinces',$selectProvinces);

        }

        if (\Schema::hasTable('districts'))
        {
            $districts          = District::all();
            $selectDistrict     = array();
            $selectDistricts[0] = "Select / All";

            foreach ($districts as $district) {
               $selectDistricts[$district->slug] = $district->name;
            }

             \View::share('selectDistricts',$selectDistricts);

        }

        if (\Schema::hasTable('municipalities'))
        {
            $municipalities          = Municipality::all();
            $selectMunicipalities    = array();
            $selectMunicipalities[0] = "Select / All";
            foreach ($municipalities as $municipality) {
               $selectMunicipalities[$municipality->slug] = $municipality->name;
            }

             \View::share('selectMunicipalities',$selectMunicipalities);

        }

        if (\Schema::hasTable('wards'))
        {
            $wards          = Ward::all();
            $selectWards    = array();
            $selectWards[0] = "Select / All";
            foreach ($wards as $ward) {
               $selectWards[$ward->slug] = $ward->name;
            }

             \View::share('selectWards',$selectWards);

        }

        if (\Schema::hasTable('categories'))
        {
            $categories          = Category::all();
            $selectCategories    = array();
            $selectCategories[0] = "Select / All";
            foreach ($categories as $category) {
               $selectCategories[$category->slug] = $category->name;
            }

             \View::share('selectCategories',$selectCategories);

        }

        if (\Schema::hasTable('sub_categories'))
        {
            $subCategories       = SubCategory::all();
            $selectSubCategories    = array();
            $selectSubCategories[0] = "Select / All";
            foreach ($subCategories as $subCategory) {
               $selectSubCategories[$subCategory->slug] = $subCategory->name;
            }

             \View::share('selectSubCategories',$selectSubCategories);

        }

        if (\Schema::hasTable('sub_sub_categories'))
        {
            $subSubCategories          = SubSubCategory::all();
            $selectSubSubCategories    = array();
            $selectSubSubCategories[0] = "Select / All";
            foreach ($subSubCategories as $subSubCategory) {
               $selectSubSubCategories[$subSubCategory->slug] = $subSubCategory->name;
            }

             \View::share('selectSubSubCategories',$selectSubSubCategories);

        }

         if (\Schema::hasTable('relationships'))
        {
            $relationships          = Relationship::all();
            $selectRelationships    = array();
            $selectRelationships[0] = "Select / All";
            foreach ($relationships as $relationship) {
               $selectRelationships[$relationship->id] = $relationship->name;
            }

             \View::share('selectRelationships',$selectRelationships);

        }


        if (\Schema::hasTable('cases')) {

            $cases = \DB::table('cases')
                        ->join('users', 'cases.reporter', '=', 'users.id')
                        ->select(
                                    \DB::raw(
                                                "
                                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterName

                                                "
                                            )
                                )
                        ->get();



            $reporters    = array();
            $reporters[0] = "Select / All";
            foreach ($cases as $case) {
               $reporters[$case->reporterName] = $case->reporterName;
            }

             \View::share('selectReporters',$reporters);

        }


        View()->composer('master',function($view){

        $view->with('addressBookNumber',addressbook::all());

          if(\Auth::check()) {

            $number = addressbook::where('user','=',\Auth::user()->id)->get();
            $view->with('addressBookNumber',$number);

            $allUsers = User::where('id','<>',\Auth::user()->id)->get();
            $view->with('loggedInUsers',$allUsers);

            $noPrivateMessages = Message::where('to','=',\Auth::user()->id)
                                         ->where('read','=',0)
                                         ->where('message_type','=',0)
                                         ->get();

            $view->with('noPrivateMessages',$noPrivateMessages);

            $noInboxMessages = Message::where('to','=',\Auth::user()->id)
                                        ->where('message_type','=',0)
                                        ->get();

            $view->with('noInboxMessages',$noInboxMessages);


            $noDepartments = Department::all();

            $view->with('noDepartments',$noDepartments);

            $noUsers = User::all();

            $view->with('noUsers',$noUsers);

            $noRoles = UserRole::all();

            $view->with('noRoles',$noRoles);

            $noPositions = Position::all();

            $view->with('noPositions',$noPositions);

            $noRelationships = Relationship::all();

            $view->with('noRelationships',$noRelationships);

            $noProvinces = Province::all();

            $view->with('noProvinces',$noProvinces);

            $noCaseStatuses = CaseStatus::all();

            $view->with('noCaseStatuses',$noCaseStatuses);

            $userRole = UserRole::where('id','=',\Auth::user()->role)->first();

            $view->with('systemRole',$userRole);

            $noCasesPriorities = CasePriority::all();

            $view->with('noCasesPriorities',$noCasesPriorities);

          }



        });

      }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
