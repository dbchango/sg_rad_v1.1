<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:sanctum');
        //$this->middleware('role:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

             $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

             return response($response, 201);
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
        $user = new User($request->all());

        $user->password = Hash::make($request->input('password')) ;

        if($user->saveOrFail()){
            return response('Recurso creado exitosamente.', 201);
        }else{
            return response('Error.', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);


        if($user){
            return response($user, 200);
        }else{
            return response('Recurso no encontrado', 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_up = new User($request->all());
        $user_up->password = Hash::make($request->input('password')) ;
        $user = User::find($id);
        $user->name = $user_up->name;
        $user->email = $user_up->email;
        $user->password = $user_up->password;


        if($user->update()){
            return response('Recurso actualizado con exito');
        }else{
            return response('Error', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id)){
            return response('Recurso eliminado correctamente', 201);
        }else{
            return response('Error.', 400);
        }
    }

    /**
     * Retrieve all the resources from the storage that match with request data
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {

        $name  = $request->input('name');
        $email = $request->input('email');

        $collection =  User::orderBy('id','ASC')

        ->name($name)
        ->email($email)
        ->paginate(10);

        return response($collection, 200);
    }

    /**
     * Assign role to user
     *
     * @return \Illuminate\Http\Response
     */
    public function giveRole($user_id, $role_id)
    {

        $user  = User::find($user_id);
        $role = Role::find($role_id);
        if($user->hasRole($role)){
            return response('Este usuario ya cuenta con este rol asignado.', 200);
        }else{
            if($user->assignRole($role)){
                return response('Rol asignado correctamente.', 201);
            }else{
                return response('Error..', 201);
            }
        }

    }



    /**
     * Assign permission to user
     *
     * @return \Illuminate\Http\Response
     */
    public function givePermission($user_id, $permission_id)
    {

        $user = User::find($user_id);
        $permission = Permission::find($permission_id);
        if($user->hasPermissionTo($permission)){
            return response('Este usuario ya cuenta con este permiso asignado.', 200);
        }else{
            if($user->givePermissionTo($permission)){
                return response('Permiso asignado con éxito.', 201);
            }else{
                return response('Error.', 400);
            }
        }
    }

    /**
     * Revoke user role
     *
     * @return \Illuminate\Http\Response
     */
    public function removeRole($user_id, $role_id)
    {

        $user = User::find($user_id);
        $role = Role::find($role_id);
        if($user->hasRole($role)){
            if($user->removeRole($role)){
                return response('Role removido con éxito.', 201);
            }else{
                return response('Error.', 400);
            }

        }else{
            return response('Este usuario no cuenta con este rol asignado.', 400);
        }
    }

    /**
     * Revoke user permission
     *
     * @return \Illuminate\Http\Response
     */
    public function deletePermiision($user_id, $permission_id)
    {
        $role = User::find($user_id);
        $permission = Permission::find($permission_id);
        if($role->hasPermissionTo($permission)){
            if($role->revokePermissionTo($permission)){
                return response('Permiso revocado exitosamente',201);
            }else{
                return response('Error interno',400);
            }
        }else{
            return response('Este usuario no tiene este permiso asignado.', 400);
        }
    }

    /**
     * Revoke user permission
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfesorInfo($user_id)
    {
        $user = User::find($user_id);

        if($user){
            $profesor = Profesor::miespe($user->name)->email($user->email)->get();
            $profesor[0]->departamento;
            $profesor[0]->area;
            $profesor[0]->dedicacion;


            if($profesor){
                return response($profesor[0], 200);
            }else{
                return response('Error al relacionar el usuario con un registro de profesor.', 400);
            }
        }else{
            return response('Error al buscar el usuario en la base de datos.', 400);
        }
    }

}
