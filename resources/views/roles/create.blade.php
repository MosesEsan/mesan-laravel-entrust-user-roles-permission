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

    <div class="span9">
        <div class="row-fluid">
            <div class="page-header">
                <h1>New Role <small>Add a new role</small></h1>
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

            <form action="{{ url('roles') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="role">Role Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="role" name="name"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="role">Display Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="role" name="display_name"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Description</label>
                        <div class="controls">
                            <textarea class="input-xlarge" id="description" rows="3" name="description" ></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="role">Role</label>
                        <div class="controls">
                            @foreach ($permission as $key => $value)
                                <input type="checkbox"  value="{{$key}}" name="permission[]"> {{$value}}<br>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success btn-large" value="Save Role" />
                        <a class="btn"  href="{{ url('/roles') }}">Cancel</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
