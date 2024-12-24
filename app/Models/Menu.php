<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Specify the correct table name
    protected $fillable = ['title', 'body', 'harga', 'photo', 'user_id'];
}
