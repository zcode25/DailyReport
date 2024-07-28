<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'manpowerId';
    public $incrementing = true;
    protected $keyType = 'string';
}
