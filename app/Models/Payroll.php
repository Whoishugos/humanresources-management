<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payroll';

    protected $fillable = [
        'employee_id',
        'pay_date',
        'salary',
        'bonuses',
        'deductions',
        'net_salary',
        'status'
    ];

    public function employee() {

        return $this->belongsTo(Employee::class);
    }

}
