<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitRequirements extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name matches the model name in plural form)
    protected $table = 'permit_requirements';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'permit_type_name',
        'duration_days',
        'permit_field',
        'requirement_link',
    ];

    // If you need to define any casts for attributes
    protected $casts = [
        'duration_days' => 'integer',
    ];
}
