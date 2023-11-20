<?php

namespace App\Models\Form13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNote extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden=["form_id"];
    public function form(){
        return $this->belongsTo(Form::class);
    }
    protected $casts = [
        'number' =>'array',
    ];
}
