<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return Book::getDataBooks();
    }
    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Penulis',
            'Tahun',
            'Penerbit'
        ];
    }
}
