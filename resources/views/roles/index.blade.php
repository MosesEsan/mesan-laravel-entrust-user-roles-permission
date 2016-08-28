<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 8/24/16
 * Time: 12:56 PM
 */
        ?>

@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="span9">
        <div class="row-fluid">
            <div class="page-header">
                <h1>Roles <small>Manage roles</small></h1>
            </div>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $key => $role)
                <tr class="list-roles">
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->name }}</td>


                    <td>

                        @permission(('role-list'))
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @endpermission

                        @permission(('role-edit'))
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endpermission

                        @permission(('role-delete'))
                        <form action="{{ url('roles/'.$role->id) }}" method="POST" style="display: inline-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                        @endpermission
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            @permission(('role-create'))
            <a href="{{ route('roles.create') }}" class="btn btn-success">New Role</a>
            @endpermission

        </div>
    </div>

@endsection

