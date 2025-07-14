<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'job_title',
        'employee_number',
        'photo',
        'slug'
    ];

    protected static function booted()
    {
        static::creating(function ($employee) {
            $employee->slug = Str::slug($employee->name . '-' . uniqid());
        });
    }
}
