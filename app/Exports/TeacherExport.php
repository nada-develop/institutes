<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class TeacherExport implements FromCollection
// {
//     class TeacherExport implements   FromQuery
// {
//     use Exportable;

//     public function query()
//     {
//         return Teacher::query();
//     }
// }

class TeacherExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->active_region == 1) {
                $teachers = Teacher::where('region_code', auth()->user()->region_code)->get();
            } elseif (auth()->user()->active_management == 1) {
                $teachers = Teacher::where('management_code', auth()->user()->management_code)->get();
            } elseif(auth()->user()->active_management != 1 && auth()->user()->active_region != 1) {
                $teachers = Teacher::where('institute_code', auth()->user()->institute_code)->get();
            }
        } else {
            $teachers = Teacher::all();
        }
        return $teachers;
    }

    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'كود المعلم',
    //         'اسم المعلم',
    //         'رقم السجل',
    //         'رقم البطاقه',
    //         'النوع',
    //         'كود النوع',
    //         'الموقف من العمل',
    //         'كود الموقف من العمل',
    //         'المنطقه',
    //         'كود المنطقه',
    //         'الاداره',
    //         'كود الاداره',
    //         'المعهد',
    //         'كود المعهد',
    //         'معهد اخر',
    //         'كود المعهد الاخر',
    //         'مادة التخصص',
    //         'كود مادة التخصص',
    //         'مادة التخصص 1 ',
    //         '1 كود مادة التخصص',
    //         '2 مادة التخصص',
    //         '2 كود مادة التخصص',
    //         'الدرجة',
    //         'كود الدرجة',
    //         'تاريخ الحصول على الدرجة',
    //         'نوع التعيين',
    //         'تاريخ التعيين',
    //         'تاريخ  استلام العمل',
    //         'المجموعة النوعية',
    //         'كود المجموعة النوعية',
    //         'الوظيفة على الكارد',
    //         'كود الوظيفة على الكادر',
    //         'تاريخ قرار الوظيفة على الكارد',
    //         'رقم قرار الوظيفة على الكارد',
    //         'اسم المؤهل',
    //         'كود المؤهل',
    //         'نوع المؤهل',
    //         'تاريخ الحصول على المؤهل',
    //         'اسم الوظيفة',
    //         'كود الوظيفة',
    //         'الكفاءة',
    //         'كود  الكفاءة',
    //     ];
    // }
}
