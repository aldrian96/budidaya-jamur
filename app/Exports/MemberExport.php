<?php

namespace App\Exports;

use App\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class MemberExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
           'No',
           'Nama',
           'No Telepon',
           'Alamat',
           'Tanggal Dibuat',
           'Tangal Diubah',
        ];
    }


    public function collection()
    {
        return Member::all();
    }
}
