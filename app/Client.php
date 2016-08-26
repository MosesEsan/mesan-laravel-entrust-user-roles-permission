<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $fillable = ['name','description', 'added_by', 'updated_by', 'website', 'status'];
}
