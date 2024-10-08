<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'weatherId';
    public $incrementing = true;
    protected $keyType = 'string';
}
