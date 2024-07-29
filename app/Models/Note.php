<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'noteId';
    public $incrementing = true;
    protected $keyType = 'string';
}
