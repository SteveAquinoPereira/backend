<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $primaryKey = 'id_section';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subjects(){
        Return $this->belongsToMany(Subject::class, 'section_subject', 'id_section02', 'id_subject01')
        ->withPivot('id_teacher');
    }
}
