<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'id_subject';

    protected $fillable = ['subject_name'];

    public function sections(){
        return $this->belongsToMany(Section::class);
    }
}
