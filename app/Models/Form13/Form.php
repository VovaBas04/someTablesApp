<?php

namespace App\Models\Form13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded=[];
    protected $hidden=["form_list_id"];
    use HasFactory;
    public function formNotes(){
        return $this->hasMany(FormNote::class);
    }
    public function formList(){
    	return $this->belongsTo(FormList::class);
    }
}
