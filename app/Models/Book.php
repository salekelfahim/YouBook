<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    public function getBookTitle()
    {
        return $this->title;
    }

    public function getBookContent()
    {
        return $this->content;
    }

    public function setBookContent($content)
    {
        $this->content = $content;
    }

    public function setBookTitle($title)
    {
        $this->title = $title;
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_book');
    }
}
