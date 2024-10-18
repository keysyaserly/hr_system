<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeerecords extends Model
{
    use HasFactory;

    // Table name and primary key configuration
    protected $table = 'employee_records';
    protected $primaryKey = 'id_number';

    protected $fillable = [
        'id_number',
        'offense_type',
        'offense_date',
        'description',
    ];

    // Relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_number', 'id_number');
    }
}
