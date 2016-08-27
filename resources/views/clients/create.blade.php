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
                <h1>New Client <small>Add a new client</small></h1>
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

            <form action="{{ url('clients') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="name">Client Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Client Info</label>
                        <div class="controls">
                            <textarea class="input-xlarge" id="description" rows="3" name="description" ></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="website">Website</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="website" name="website"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="addedby">Added By</label>
                        <div class="controls">
                            <select id="addedby" name="added_by">
                                @foreach ($consultants as $key => $consultant)
                                    <option value="{{$key}}">{{$consultant}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="status">Status</label>
                        <div class="controls">
                            <select id="status" name="status">
                                @foreach ($status as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success btn-large" value="Save Client" />
                        <a class="btn"  href="{{ url('/clients') }}">Cancel</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
