<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 8/24/16
 * Time: 12:57 PM
 */
        ?>

@extends('layouts.app')

@section('content')
    <div class="span9">
        <div class="row-fluid">
            <div class="page-header">
                <h1>Edit Role <small>Update role info</small></h1>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ url('roles/'.$role->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="role">Role Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="role" name="name" disabled value="{{$role->name}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="role">Display Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="role" name="display_name" value="{{$role->display_name}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Description</label>
                        <div class="controls">
                            <textarea class="input-xlarge" id="description" rows="3" name="description" >{{$role->description}}</textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="role">Role</label>
                        <div class="controls">
                            @foreach ($permission as $value)
                                <input type="checkbox"  value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? "checked" : null}} name="permission[]">{{$value->display_name}}<br>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success btn-large" value="Save Changes" />
                        <a class="btn"  href="{{ url('/roles') }}">Cancel</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
