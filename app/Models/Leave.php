<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    protected $table = 'leave_request';
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'reason',
        'status',
        'leave_type',
    ];
     public function employee() {

        return $this->belongsTo(Employee::class);
    }
}
