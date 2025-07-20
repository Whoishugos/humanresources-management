<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Get the employees for the role.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
