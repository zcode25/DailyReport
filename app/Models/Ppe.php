<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppe extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'ppeId';
    public $incrementing = true;
    protected $keyType = 'string';
}
