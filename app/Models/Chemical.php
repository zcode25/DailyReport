<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'chemicalId';
    public $incrementing = true;
    protected $keyType = 'string';
}
