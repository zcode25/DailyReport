<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityPlan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'activityPlanId';
    public $incrementing = true;
    protected $keyType = 'string';
}
