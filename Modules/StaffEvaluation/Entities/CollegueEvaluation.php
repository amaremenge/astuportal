<?php

namespace Modules\StaffEvaluation\Entities;

use Illuminate\Database\Eloquent\Model;

class CollegueEvaluation extends Model
{
    protected $fillable = ['id','staff_id','evaluation_session_id'];

}
