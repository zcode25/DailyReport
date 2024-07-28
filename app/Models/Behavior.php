<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'behaviorId';
    public $incrementing = true;
    protected $keyType = 'string';
}
