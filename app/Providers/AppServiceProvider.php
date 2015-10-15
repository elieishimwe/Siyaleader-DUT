<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Position;
use App\Department;
use App\Province;
use App\District;
use App\Municipality;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\CaseReport;
use App\User;
use App\Relationship;
use App\addressbook;
use App\Message;


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

        if (\Schema::hasTable('sub-categories'))
        {
            $subCategories       = SubCategory::all();
            $selectSubCategories    = array();
            $selectSubCategories[0] = "Select / All";
            foreach ($subCategories as $subCategory) {
               $selectSubCategories[$subCategory->slug] = $subCategory->name;
            }

             \View::share('selectSubCategories',$selectSubCategories);

        }

        if (\Schema::hasTable('sub-sub-categories'))
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
                                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`FirstName`, ' ', `Surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterName

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
                                         ->where('online','=',0)
                                         ->get();

            $view->with('noPrivateMessages',$noPrivateMessages);

            $noInboxMessages = Message::where('to','=',\Auth::user()->id)
                                        ->where('online','=',0)
                                        ->get();

            $view->with('noInboxMessages',$noInboxMessages);

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
