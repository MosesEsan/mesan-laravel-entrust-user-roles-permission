<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 23/08/2017
 * Time: 20:24
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Role Management</div>

                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($roles as $key => $role)

                                <tr class="list-users">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                                        <form action="{{ url('admin/roles/'.$role->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('roles.create') }}" class="btn btn-success">New Role</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
