<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user->can('read-users')) {
            return Response::json([
          'error' => "Forbidden",
        ], 403);
        }
        return User::with(['roles'=>function ($query) {
            $query->select('name');
        }])->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        if (!$user) {
            return Response::json([
            'error' => "Not Found",
          ], 404);
        }
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if (!$user->can('delete-user')) {
            return Response::json([
            'error' => "Forbidden",
          ], 403);
        }
        $user=User::find($id);
        if (!$user) {
            return Response::json([
            'error' => "Gone",
          ], 410);
        }
        $user->delete();
        return response()->json(['status' => 'ok']);
    }
    public function roles($id)
    {
        $user = Auth::user();
        if (!$user->can('read-user-roles')) {
            return Response::json([
          'error' => "Forbidden",
        ], 403);
        }
        $user=User::find($id);
        if (!$user) {
            return Response::json([
            'error' => "Not Found",
          ], 404);
        }
        return $user->roles->all();
    }
    public function updateroles(Request $request, $uid, $rid)
    {
        $user = Auth::user();
        if (!$user->can('edit-user-roles')) {
            return Response::json([
          'error' => "Forbidden",
        ], 403);
        }
        $user=User::find($uid);
        $role=Role::find($rid);

        if (!$user or !$role) {
            return Response::json([
            'error' => "Not Found",
          ], 404);
        }
        $flag =$request->status;
        if ($user->hasRole($role->name)==$flag) {
            return Response::json([
          'error' => "Conflict",
        ], 409);
        }
        $flag? $user->attachRole($role):$user->detachRole($role);
        return Response::json(['status'=>'ok']);
    }
}
