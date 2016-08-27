<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Client;
use App\Role;
use App\User;
use App\ClientStatus;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id','DESC')->get();

//        print_r($clients) ;
        return view('clients.index',compact('clients'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultants = User::whereHas('roles', function($q){
            $q->where('name', 'consultant');
        })->pluck('name','id');

        $status= ClientStatus::pluck('name','id');

        return view('clients.create',compact('consultants', 'status'));
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
            'name' => 'required',
            'description' => 'required',
            'added_by' => 'required',
            'status' => 'required',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success','Client created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        $consultants = User::whereHas('roles', function($q){
            $q->where('name', 'consultant');
        })->pluck('name','id');

        $status= ClientStatus::pluck('name','id');


        return view('clients.edit',compact('client','consultants', 'status'));
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'added_by' => 'required',
            'status' => 'required',
        ]);

        Client::find($id)->update($request->all());

        return redirect()->route('clients.index')
            ->with('success','Client updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->route('clients.index')
            ->with('success','Client deleted successfully');
    }
}
