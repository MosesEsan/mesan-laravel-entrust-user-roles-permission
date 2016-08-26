<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 8/24/16
 * Time: 12:54 PM
 */
        ?>

@extends('layouts.app')

@section('content')
    <div class="span9">
        <div class="row-fluid">
            <div class="page-header">
                <h1>Clients <small>All clients</small></h1>
            </div>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Website</th>
                    <th>Status</th>
                    <th>Added By</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($clients as $key => $client)

                    <tr class="list-users">
                        <td>{{ ++$i }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->description }}</td>
                        <td>{{ $client->website }}</td>
                        <td>{{ $client->status }}</td>
                        <td>{{ $client->added_by }}</td>

                        <td>
                            <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Show</a>
                            @permission(('item-edit'))
                            <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>
                            @endpermission
                            @permission(('item-delete'))
                            {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            @endpermission
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @permission(('item-create'))
            <a href="{{ route('clients.create') }}" class="btn btn-success">New Client</a>
            @endpermission
        </div>
    </div>
@endsection
