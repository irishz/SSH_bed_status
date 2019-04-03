<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    protected $table = 'beds';

    protected  $primaryKey = 'bed_number';
    public $incrementing = false;
}
