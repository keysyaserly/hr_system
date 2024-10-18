<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyData extends Model
{
    use HasFactory;

    // Table name configuration
    protected $table = 'family_datas';

    // Fillable columns
    protected $fillable = [
        'id_number',
        'mate_name',
        'child_name',
        'wedding_date',
        'wedding_certificate_number',
    ];

    // Relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_number', 'id_number');
    }
}
