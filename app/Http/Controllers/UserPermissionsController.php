<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v1.password-reset');

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
        // return $request->all();
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->c_password);
        $user->save();
        return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function show(UserPermissions $userPermissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPermissions $userPermissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPermissions $userPermissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPermissions $userPermissions)
    {
        //
    }
}
