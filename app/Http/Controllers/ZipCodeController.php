<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCode;

class ZipCodeController extends Controller
{
    public function zip_codes($code)
    {
        $fileName = public_path('CPdescarga.txt');
        $counter = 0;
        $codes = array();
        
        //d_codigo| 0
        //d_asenta| 1
        //d_tipo_asenta| 2
        //D_mnpio| 3
        //d_estado| 4
        //d_ciudad| 5 
        //d_CP| 6
        //c_estado 7
        //|c_oficina| 8
        //c_CP| 9
        //c_tipo_asenta| 10
        //c_mnpio| 11
        //id_asenta_cpcons| 12
        //d_zona| 13
        //c_cve_ciudad 14
        foreach(file($fileName) as $line) {
            $data = explode('|', $line);

            if ($counter > 0) {
                $codes[$data[0]] = array(
                    'zip_code' => $data[0],
                    'locality' => utf8_encode($data[4]),
                    'federal_entity' => array(
                        'name' => utf8_encode($data[4]),
                        'code' => utf8_encode($data[6]),
                    ),
                    'settlements' => array(
                        'name' => utf8_encode($data[1]),
                        'zone_type' => $data[13],
                        'settlement_type' => ['name' => $data[2]],
                    ),
                    'municipality' => ['name' => utf8_encode($data[3])]
                );
            }

            $counter++;
        } 

        return response($codes[$code]);
    }

    public function import() {
        ZipCode::all();
    }
}
