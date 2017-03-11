<?php

namespace App\Http\Controllers;

// use Auth;
// use Validator;
// use Response;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class RoleController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return Role::all();
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(array $data)
  {
    return Role::create([
      'name' => $data['name'],
      'display_name' => $data['display_name'],
      'description' => $data['description'],
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $user = Auth::user();
    if(!$user->can('create-role')){
      return Response::json([
        'error' => "Forbidden",
      ], 403);
    }
    $rq=$request->all();
    $rq['id']='0';
    $validate = $this->validator($rq);
    if ($validate->fails()) {
      return $validate->errors();
    }
    $this->create($request->all());
    return response()->json(['status' => 'ok']);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $role=Role::find($id);
    if(!$role){
      return Response::json([
        'error' => "Not Found",
      ], 404);
    }
    return Role::find($id);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function edit(Role $role)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request,$id)
  {
    $user = Auth::user();
    if(!$user->can('edit-role')){
      return Response::json([
        'error' => "Forbidden",
      ], 403);
    }
    $role=Role::find($id);
    if(!$role){
      return Response::json([
        'error' => "Not Found",
      ], 404);
    }
    $rq=$request->all();
    $rq["id"]=$id;
    $validate = $this->validator($rq);
    if ($validate->fails()) {
      return $validate->errors();
    }
    $role->name=$rq['name'];
    $role->display_name=$rq['display_name'];
    $role->description=$rq['description'];
    $role->save();
    return $role;
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Role  $role
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $user = Auth::user();
    if(!$user->can('delete-role')){
      return Response::json([
        'error' => "Forbidden",
      ], 403);
    }
    $role=Role::find($id);
    if(!$role){
      return Response::json([
        'error' => "Gone",
      ], 410);
    }
    $role->delete();
    return response()->json(['status' => 'ok']);
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      // 'name' => 'required|max:255|unique:roles,'."12",
      'name'=> [
        'required',
        'max:255',
        Rule::unique('roles')->ignore($data['id']),
      ],
      'display_name'=> [
        'required',
        'max:255',
        Rule::unique('roles')->ignore($data['id']),
      ],
      // 'description' => 'required|min:6',
    ]);
  }
}
