<?php

namespace App\Imports;

use App\Models\SpotList;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class SpotListImport implements ToModel,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['spot'])   {

            $arr = ['spot'     => $row['spot'],
            'prix'    => $row['prix'],
            'profile_facebook'    => $row['profile_facebook'],
            'ref_domain'    => $row['ref_domain'],
            'trust_flow'    => $row['trust_flow'],
            'citation_flow'    => $row['citation_flow'],
            'majestic_flow'    => $row['majestic_index'],
            'keywords'    => $row['keywords'],
            ];
            
            return new SpotList($arr);
        }
    }
}
