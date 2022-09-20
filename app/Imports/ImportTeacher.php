<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;
class ImportTeacher implements ToModel,WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'teacher_code' =>$row['teacher_code'] ?? '',
            'teacher_name' =>$row['teacher_name'] ?? '',
            'record_number' =>$row['record_number'] ?? '',
            'national_ID' =>$row['national_id'] ?? '',
            'gender' =>$row['gender'] ?? '',
            'gender_code' =>$row['gender_code'] ?? '',
            'job_attitude' =>$row['job_attitude'] ?? '',
            'job_attitude_code' =>$row['job_attitude_code'] ?? '',
            'region' =>$row['region'] ?? '',
            'region_code' =>$row['region_code'] ?? '',
            'management' =>$row['management'] ?? '',
            'management_code' =>$row['management_code'] ?? 0,
            'institute' =>$row['institute'] ?? '',
            'institute_code' =>$row['institute_code'] ?? 0,
            'another_institute' =>$row['another_institute'] ?? '',
            'another_institute_code' =>$row['another_institute_code'] ?? '',
            'subject' =>$row['subject'] ?? '',
            'subject_code' =>$row['subject_code'] ?? '',
            'another_subject' =>$row['another_subject'] ?? '',
            'another_subject_code' =>$row['another_subject_code'] ?? '',
            'another_subject_two' =>$row['another_subject_two'] ?? '',
            'another_subject_two_code' =>$row['another_subject_two_code'] ?? '',
            'degree' =>$row['degree'] ?? '',
            'degree_code' =>$row['degree_code'] ?? '',
            'date_of_obtaining' => $row['degree_code'] ? Carbon::parse($row['date_of_obtaining'])->format('Y-m-d')  : '',
            'hiring_type' =>$row['hiring_type'] ?? '',
            'hiring_date' =>Carbon::parse($row['hiring_date'])->format('Y-m-d'),
            'date_receipt_the_work' =>Carbon::parse($row['date_receipt_the_work'])->format('Y-m-d')?? '',
            'group_type' =>$row['group_type'] ?? '',
            'group_type_code' =>$row['group_type_code'] ?? '',
            'job_staff' =>$row['job_staff'] ?? '',
            'job_staff_code' =>$row['job_staff_code'] ?? '',
            'job_decision_staff_date' =>Carbon::parse($row['job_decision_staff_date'])->format('Y-m-d')?? '',
            'job_decision_staff_code' =>$row['job_decision_staff_code'] ?? 0,
            'qualification_name' =>$row['qualification_name'] ?? '',
            'qualification_code' =>$row['qualification_code'] ?? '',
            'qualification_type' =>$row['qualification_type'] ?? '',
            'qualification_date' =>Carbon::parse($row['qualification_date'])->format('Y-m-d')?? '',
            'job_name' =>$row['job_name'] ?? '',
            'job_code' =>$row['job_code'] ?? '',
            'efficiency_name' =>$row['efficiency'] ?? '',
            'efficiency_code' =>$row['efficiency_code'] ?? '',
        ]);
    }

}
