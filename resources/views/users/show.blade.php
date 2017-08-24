<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 23/08/2017
 * Time: 21:27
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Info</div>

                    <div class="panel-body">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            {{ $user->name }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">E-mail</label>
                            {{ $user->email }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Roles</label>
                            @if(!empty($user->roles))
                                @foreach($user->roles as $role)
                                    <label class="label label-success">{{ $role->display_name }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
