<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AccountingPage extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['accountingBook_id'];
    public function accountingNotes(){
        return $this->hasMany(AccountingNote::class);
    }
    public function accountingBook(){
        return $this->belongsTo(AccountingBook::class);
    }
}
