<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function evaluations() {
        # Employee has many evaluations
        return $this->hasMany('App\Evaluation');
    }

    public function skillevals() {
        # Employee has many skillevals
        return $this->hasMany('App\SkillEval');
    }

    public static function getForDropdown() {
        $employees = Employee::orderBy('last_name', 'ASC')->get();
        $employees_for_dropdown = [];
        foreach($employees as $employee) {
            $employees_for_dropdown[$employee->id] = $employee->last_name . ", " . $employee->first_name;
        }
        return $employees_for_dropdown;
    }
}
