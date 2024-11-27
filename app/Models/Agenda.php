<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name matches the model name in plural form)
    protected $table = 'agenda';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'theme',
        'place',
        'start_date',
        'end_date',
        'activity',
    ];

    // If you need to define any date casts for attributes
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
