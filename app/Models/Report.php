<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'reportId';
    public $incrementing = false;
    protected $keyType = 'string';

    public function project(){
        return $this->belongsTo(Project::class, 'projectId');
    }
}
