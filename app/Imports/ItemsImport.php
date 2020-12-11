<?php

namespace App\Imports;

use App\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ItemsImport implements ToCollection
{
    public $data;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // foreach ($rows as $row) 
        // {
           
        // }
        $this->data = $rows;
    }
}
