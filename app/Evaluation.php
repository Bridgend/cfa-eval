<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function employees() {
        # Evaluation belongs to Employee
        return $this->belongsTo('App\Employee');
    }
}
