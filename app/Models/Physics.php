<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physics extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'physicId';
    public $incrementing = true;
    protected $keyType = 'string';
}
