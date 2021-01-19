<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $dates = ['date','time'];
    protected $fillable = [
        'title',
        'date',
        'time',
        'description',
        'status',
    ];
    use HasFactory;
}
