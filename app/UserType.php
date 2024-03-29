<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
}
