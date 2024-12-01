<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name matches the model name in plural form)
    protected $table = 'regulation';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'description',
    ];
}
