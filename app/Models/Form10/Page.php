<?php

namespace App\Models\Form10;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Page
 *
 * @mixin Builder
 */
class Page extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['book_id'];
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
