<?php

namespace App\Models\Form13;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormList extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [];
    public function forms(){
        return $this->hasMany(Form::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
