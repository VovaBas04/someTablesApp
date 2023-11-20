<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingNote extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [];
    public function accountingPage(){
        return $this->belongsTo(User::class);
    }

}
