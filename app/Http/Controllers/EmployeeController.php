<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Employee;
use App\EmployeeUser;
use App\Helpers\DocNo;
use App\Permissions;
use App\User;
use App\UserPermissions;
use App\UserRole;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v1.colorpro.company.employees');
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
        $this->validate($request, [
            'employee_name'         => 'required ',
        ]);
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $employee = new Employee;
        $employee->employee_code        = DocNo::getDocNumberString('emp',1);
        $employee->company_id        = $company_id;
        $employee->employee_name        = $request->employee_name;
        $employee->dob        = $request->dob;
        $employee->gender        = $request->gender;
        $employee->religion        = $request->religion;
        $employee->martial_status_id        = $request->martial_status_id;
        $employee->blood_group_id        = $request->blood_group_id;
        $employee->status_id        = $request->status_id;
        $employee->branch        = $request->branch;
        $employee->date_of_termination        = $request->date_of_termination;
        $employee->place_of_birth        = $request->place_of_birth;
        $employee->perm_address_line1        = $request->perm_address_line1;
        $employee->perm_address_line2        = $request->perm_address_line2;
        $employee->perm_address_line3        = $request->perm_address_line3;
        $employee->district_id        = $request->district_id;
        $employee->state_id        = $request->state_id;
        $employee->country_id        = $request->country_id;
        $employee->pin        = $request->pin;
        $employee->mobile_number        = $request->mobile_number;
        $employee->phone_number        = $request->phone_number;
        $employee->email        = $request->email;
        $employee->passport_no        = $request->passport_no;
        $employee->issued_country        = $request->issued_country;
        $employee->bank_account        = $request->bank_account;
        $employee->ifsc_code        = $request->ifsc_code;
        $employee->profile_img        = $request->profile_img;
        $employee->class_id        = $request->class_id;
        $employee->designation_id        = $request->designation_id;
        $employee->department_id        = $request->department_id;
        $employee->section_id        = $request->section_id;
        $employee->emp_catagory        = $request->emp_catagory;
        $employee->date_of_joining        = $request->date_of_joining;
        $employee->date_of_retirement        = $request->date_of_retirement;
        $employee->date_of_confirmation        = $request->date_of_confirmation;
        $employee->esi_yn        = $request->esi_yn;
        $employee->pf_yn        = $request->pf_yn;
        $employee->basic_pay        = $request->basic_pay;
        $employee->spl_pay        = $request->spl_pay;
        $employee->da        = $request->da;
        $employee->hra        = $request->hra;
        $employee->special_allowance        = $request->special_allowance;
        $employee->conveyance_allowance        = $request->conveyance_allowance;
        $employee->food_allowance        = $request->food_allowance;
        $employee->cf        = $request->cf;
        $employee->bf        = $request->bf;
        $employee->created_by        = $request->created_by;
        $employee->is_available        = $request->is_available;
        $employee->is_deleted        = $request->is_deleted;
        $employee->has_access        = $request->has_access;
        $employee->save();
        $doc = DocNo::updateDoc('emp',1);
        
        return response(['employee_code' => $employee->employee_code],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show( $employee)
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();

        return Employee::where(['id' => $employee,'company_id' => $company_id])->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'employee_name'         => 'required ',
        ]);
        $employee->employee_name        = $request->employee_name;
        $employee->dob        = $request->dob;
        $employee->gender        = $request->gender;
        $employee->religion        = $request->religion;
        $employee->martial_status_id        = $request->martial_status_id;
        $employee->blood_group_id        = $request->blood_group_id;
        $employee->status_id        = $request->status_id;
        $employee->branch        = $request->branch;
        $employee->date_of_termination        = $request->date_of_termination;
        $employee->place_of_birth        = $request->place_of_birth;
        $employee->perm_address_line1        = $request->perm_address_line1;
        $employee->perm_address_line2        = $request->perm_address_line2;
        $employee->perm_address_line3        = $request->perm_address_line3;
        $employee->district_id        = $request->district_id;
        $employee->state_id        = $request->state_id;
        $employee->country_id        = $request->country_id;
        $employee->pin        = $request->pin;
        $employee->mobile_number        = $request->mobile_number;
        $employee->phone_number        = $request->phone_number;
        $employee->email        = $request->email;
        $employee->passport_no        = $request->passport_no;
        $employee->issued_country        = $request->issued_country;
        $employee->bank_account        = $request->bank_account;
        $employee->ifsc_code        = $request->ifsc_code;
        $employee->profile_img        = $request->profile_img;
        $employee->class_id        = $request->class_id;
        $employee->designation_id        = $request->designation_id;
        $employee->department_id        = $request->department_id;
        $employee->section_id        = $request->section_id;
        $employee->emp_catagory        = $request->emp_catagory;
        $employee->date_of_joining        = $request->date_of_joining;
        $employee->date_of_retirement        = $request->date_of_retirement;
        $employee->date_of_confirmation        = $request->date_of_confirmation;
        $employee->esi_yn        = $request->esi_yn;
        $employee->pf_yn        = $request->pf_yn;
        $employee->basic_pay        = $request->basic_pay;
        $employee->spl_pay        = $request->spl_pay;
        $employee->da        = $request->da;
        $employee->hra        = $request->hra;
        $employee->special_allowance        = $request->special_allowance;
        $employee->conveyance_allowance        = $request->conveyance_allowance;
        $employee->food_allowance        = $request->food_allowance;
        $employee->cf        = $request->cf;
        $employee->bf        = $request->bf;
        $employee->created_by        = $request->created_by;
        $employee->is_available        = $request->is_available;
        $employee->is_deleted        = $request->is_deleted;
        $employee->has_access        = $request->has_access;
        $employee->save();
        return $employee;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function getUser()
    {
        return view('v1.colorpro.company.users');
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'employee_id'         => 'required ',
            'username'         => 'required ',
            'password'         => 'required ',
        ]);
        $permissions = $request->permissions;
        $employee = Employee::where('id',$request->employee_id)->first();
        $user = new User;
        $user->name = $employee->employee_name;
        $user->email = $employee->email;
        $user->username = $request->username;
        $user->type = 'employee';
        $user->password = Hash::make($request->password);
        $user->save();
        $user_role = new UserRole();
        $user_role->user_id = $user->id;
        $user_role->role_id = 3;
        $user_role->save();
        $customer_user = new EmployeeUser();
        $customer_user->user_id = $user->id;
        $customer_user->employee_id = $employee->id;
        $customer_user->save();

        if(count($permissions) > 0){
            foreach($permissions as $permKey => $permVal){
                foreach($permVal as $permSubKey => $permSubVal){
                    foreach($permSubVal as $permInnerSubKey => $permInnerSubVal){
                        foreach($permInnerSubVal as $permItemKey => $permItemVal){
                            if(isset($permItemVal['status']) && $permItemVal['status'] == true){

                               $u_permissions = new UserPermissions;
                               $u_permissions->permission_id = $permItemVal['id'];
                               $u_permissions->user_id = $user->id ;
                               $u_permissions->limit = isset($permItemVal['limit']) ? $permItemVal['limit'] : 0;
                               $u_permissions->save();
                            } 
                        }
                    }
                }
            }
        }
        return 'true' ;

    }

    public function showUser($id)
    {
        $user = User::find($id);
         $user_permissions = UserPermissions::where('user_id',$id)->pluck('permission_id');
          $not_applied_permissions = Permissions::whereNotIn('id',$user_permissions)->get();
          $applied_permissions = Permissions::whereIn('id',$user_permissions)->get();
             $not_applied_permissions->map(function ($value, $key) {
                $value['status']=false;
                return $value;
            });
             $applied_permissions->map(function ($value, $key) use($id) {
                $value['status']=true;
                if($value['has_limit'] == 1){
                    $value['limit'] = UserPermissions::where(['user_id' => $id, 'permission_id' => $value['id']])->pluck('limit')->first();
                }
                return $value;
            });
            $all_permission                         = $not_applied_permissions
                                                  ->concat($applied_permissions);

            $grpd = $all_permission->groupBy(['side_menu','parent_menu','title']);
            $user->permissions = $grpd;
            return $user;

    }

    public function updateUser(Request $request , $id)
    {
        $user =  User::find($id);
        $user->status = $request->status;
        $user->save();
        $permissions = $request->permissions;
        UserPermissions::where('user_id',$id)->delete();
        if(count($permissions) > 0){
            foreach($permissions as $permKey => $permVal){
                foreach($permVal as $permSubKey => $permSubVal){
                    foreach($permSubVal as $permInnerSubKey => $permInnerSubVal){
                        foreach($permInnerSubVal as $permItemKey => $permItemVal){
                            if(isset($permItemVal['status']) && $permItemVal['status'] == true){

                               $u_permissions = new UserPermissions;
                               $u_permissions->permission_id = $permItemVal['id'];
                               $u_permissions->user_id = $user->id ;
                               $u_permissions->limit = isset($permItemVal['limit']) ? $permItemVal['limit'] : 0;
                               $u_permissions->save();
                            } 
                        }
                    }
                }
            }
        }
        return 'true' ;
    }
}
