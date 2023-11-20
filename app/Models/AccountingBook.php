<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingBook extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function accountingPages(){
        return $this->hasMany(AccountingPage::class);
    }
}
