<?php

namespace App\Models\Form10;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Note
 *
 * @mixin Builder
 */
class Note extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['page_id'];
    public function page(){
        return $this->belongsTo(Page::class);
    }
    public function militaryunits(){
        return $this->hasMany(MilitaryUnit::class);
    }
    protected $casts = [
        'categories_stock' =>'array',
        'categories_all' =>'array'
    ];
}
