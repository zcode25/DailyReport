<?php

namespace App\Models;

use App\Models\Report;
use App\Models\Reporter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'projectId';
    public $incrementing = true;
    protected $keyType = 'string';

    public function report(){
        return $this->hasMany(Report::class, 'reportId', 'reportId');
    }

    public function reporter(){
        return $this->hasMany(Reporter::class, 'reporterId', 'reporterId');
    }
}
