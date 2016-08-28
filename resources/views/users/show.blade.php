<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 8/24/16
 * Time: 12:53 PM
 */
        ?>

@extends('layouts.app')


@section('content')
    <div class="span9">
        <div class="row-fluid">
            <div class="page-header">
                <h1>{{ $user->name }} <small>User Info</small></h1>
            </div>
            <div>
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->roles))
                        <div>
                        @foreach($user->roles as $v)
                            <label class="label label-success" style="float: left; margin-right: 5px">{{ $v->display_name }}</label>
                        @endforeach
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
