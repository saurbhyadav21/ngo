<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class GenericExport implements FromCollection
{
    
     protected $data;

    public function __construct(array $data)
    {
        $this->data = collect($data);
    }

    public function collection()
    {
        return $this->data;
    }
}
