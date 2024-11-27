<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name matches the pluralized model name)
    protected $table = 'about';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'description',
        'content',
    ];
}
