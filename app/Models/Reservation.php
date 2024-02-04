<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_user', 'id_book'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function book()
    // {
    //     return $this->belongsTo(Book::class);
    // }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); 
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book'); 
    }
}

