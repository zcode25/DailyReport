<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikology extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'psikologyId';
    public $incrementing = true;
    protected $keyType = 'string';
}
