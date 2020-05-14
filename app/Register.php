<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table      = 'registration';
    protected $primaryKey = 'id';
	public    $timestamps = false;
}
