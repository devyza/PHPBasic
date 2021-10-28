<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mas assignable
     * 
     * @var string[]
     */
    protected $fillable = [
        'name', 'jobTitle', 'email', 'nationality', 'company_id'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
