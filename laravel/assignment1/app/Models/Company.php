<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Table name
     */
    protected $table = 'companies';

    /**
     * The attributes that are mas assignable
     * 
     * @var string[]
     */
    protected $fillable = ['id', 'name', 'country'];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
