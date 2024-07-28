<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'conditionId';
    public $incrementing = true;
    protected $keyType = 'string';
}
