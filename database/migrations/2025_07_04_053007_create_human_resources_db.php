<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('address');
            $table->date('birth_date');
            $table->date('hire_date');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('role_id')->constrained('roles');
            $table->string('status'); // active, inactive, terminated
            $table->decimal('salary', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
             $table->foreignId('assigned_to')->constrained('employees');
             $table->date('due_date')->nullable();
             $table->string('status'); // pending, in_progress, completed
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
             $table->foreignId('employee_id')->constrained('employees');
             $table->date('pay_date');
             $table->decimal('salary', 10, 2);
             $table->decimal('bonuses', 10, 2)->nullable();
             $table->decimal('deductions', 10, 2)->nullable();
             $table->decimal('net_salary', 10, 2);
             $table->string('status'); // unpaid, paid
            $table->timestamps();
            $table->softDeletes();
        });
         Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employees_id')->constrained('employees');
            $table->date('attendance_date');
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->string('status'); // present, absent, late,
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('leave_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('reason')->nullable();
            $table->string('status'); // pending, approved, rejected
            $table->string('leave_type'); // annual, sick, personal, etc.
            $table->timestamps();
            $table->softDeletes();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('employees');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('payroll');
        Schema::dropIfExists('presences');
        Schema::dropIfExists('leave_request');

    }
};
