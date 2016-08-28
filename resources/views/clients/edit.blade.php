<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 8/24/16
 * Time: 12:55 PM
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
                <h1>Edit Client <small>Update client info</small></h1>
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

            <form action="{{ url('clients/'.$client->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="name">Client Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="name" name="name" value="{{$client->name}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Client Info</label>
                        <div class="controls">
                            <textarea class="input-xlarge" id="description" rows="3" name="description">{{$client->description}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="website">Website</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="website" name="website" value="{{$client->website}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="addedby">Added By</label>
                        <div class="controls">
                            <select id="addedby" name="added_by">
                                @foreach ($consultants as $key => $consultant)
                                    <option value="{{$key}}"  {{($key === $client->added_by) ? "selected" : null}}>{{$consultant}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="status">Status</label>
                        <div class="controls">
                            <select id="status" name="status">
                                @foreach ($status as $key => $value)
                                    <option value="{{$key}}" {{($key === $client->status) ? "selected" : null}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success btn-large" value="Save Changes" />
                        <a class="btn"  href="{{ url('/clients') }}">Cancel</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection