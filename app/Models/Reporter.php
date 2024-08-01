<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'reporterId';
    public $incrementing = true;
    protected $keyType = 'string';

    public function project(){
        return $this->belongsTo(Project::class, 'projectId');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
