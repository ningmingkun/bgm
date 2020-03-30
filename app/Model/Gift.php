<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    public $primaryKey='gift_id';
    protected $guarded = [];
    protected $table = 'gift';
    public $timestamps = false;
}
