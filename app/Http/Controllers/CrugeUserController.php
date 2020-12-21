<?php

namespace App\Http\Controllers;

use App\CrugeUser;
use Illuminate\Http\Request;

class CrugeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * List all the resources from the storage that match with request data using pagination
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request){
        $code = $request->input('iduser');
        $username = $request->input('username');
        $mail = $request->input('email');
        $state = $request->input('state');
        $last_access = $request->input('logondate');
        $collection = CrugeUser::orderBy('iduser')
        ->code($code)
        ->username($username)
        ->mail($mail)
        ->state($state)
        ->lastaccess($last_access)
        ->paginate(10);
        return response($collection, 200);
    }
}
