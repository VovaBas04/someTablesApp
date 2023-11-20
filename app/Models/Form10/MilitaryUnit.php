<?php

namespace App\Models\Form10;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MilitaryUnit
 *
 * @mixin Builder
 */
class MilitaryUnit extends Model
{
    public $timestamps=false;
    protected $guarded=[];
    protected $hidden=[];
    use HasFactory;
    public function note(){
        return $this->belongsTo(Note::class);
    }
    protected $casts = [
        'categories_military' => 'array',
    ];
}
