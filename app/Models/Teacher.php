<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_code',
        'teacher_name',
        'record_number',
        'national_ID',
        'gender',
        'gender_code',
        'job_attitude',
        'job_attitude_code',
        'region',
        'region_code',
        'management',
        'management_code',
        'institute',
        'institute_code',
        'another_institute',
        'another_institute_code',
        'another_institute_two',
        'another_institute_two_code',
        'subject',
        'subject_code',
        'another_subject',
        'another_subject_code',
        'another_subject_two',
        'another_subject_two_code',
        'degree',
        'degree_code',
        'date_of_obtaining',
        'hiring_type',
        'hiring_date',
        'date_receipt_the_work',
        'group_type',
        'group_type_code',
        'job_staff',
        'job_staff_code',
        'job_decision_staff_date',
        'job_decision_staff_code',
        'qualification_name',
        'qualification_code',
        'qualification_type',
        'qualification_date',
        'job_name',
        'job_code',
        'efficiency_code',
        'efficiency',
        'educational_level',
        'institute_classes'

    ];
}
