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
                <h1>{{ $role->display_name }} <small>Role Info</small></h1>
            </div>
            <div>
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->display_name }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $role->description }}
                    </div>
                </div>
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        <div>
                        @foreach($rolePermissions as $v)
                            <label class="label label-success" style="float: left; margin-right: 5px">{{ $v->display_name }}</label>
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
