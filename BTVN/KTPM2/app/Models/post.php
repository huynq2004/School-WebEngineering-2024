<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];
}
