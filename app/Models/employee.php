<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    // Soft delete configuration
    protected $dates = ['deleted_at'];

    // Table name and primary key configuration
    protected $table = 'employees';
    protected $primaryKey = 'id_number';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_number',
        'full_name',
        'nickname',
        'contract_date',
        'work_date',
        'status',
        'position',
        'nuptk',
        'gender',
        'place_birth',
        'birth_date',
        'religion',
        'email',
        'hobby',
        'marital_status',
        'residence_address',
        'phone',
        'address_emergency',
        'phone_emergency',
        'blood_type',
        'last_education',
        'agency',
        'graduation_year',
        'competency_training_place',
        'organizational_experience',
        'mate_name',
        'child_name',
        'wedding_date',
        'wedding_certificate_number',
    ];

    // Relationship to EmployeeRecord
    public function employeeRecords()
    {
        return $this->hasMany(employeerecords::class, 'id_number', 'id_number');
    }

    // Relationship to FamilyData
    public function familyData()
    {
        return $this->hasOne(FamilyData::class, 'id_number', 'id_number');
    }
}
