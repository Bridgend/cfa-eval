<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillEval extends Model
{
    public function employees() {
        # SkillEval belongs to Employee
        return $this->belongsTo('App\Employee');
    }
}
