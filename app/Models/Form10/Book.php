<?php

namespace App\Models\Form10;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Book
 *
 * @mixin Builder
 */
class Book extends Model
{
    use HasFactory;
//    protected $hidden = ['user_id'];
    protected $guarded=[];
    public function pages(){
        return $this->hasMany(Page::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
