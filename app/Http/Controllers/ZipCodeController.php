<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZipCodeController extends Controller
{

    /**
     * Método para importar los códigos a la base de datos
     * 
     * @return void
     */
    public function import()
    {
        // Se quita el límite de espera
        set_time_limit(0);

        $fileName = public_path('CPdescarga.txt');

        // Lee el archivo línea por línea
        foreach(file($fileName) as $key => $line) {

            // Convierte la línea a un arreglo
            $data = explode('|', $line); 

            // Se inserta la información de la línea leída a la tabla, omitiendo los títulos
            if ($key > 0) {
                DB::table('zip_codes')->insert([
                    'd_codigo' => $data[0],
                    'd_asenta' => utf8_encode($data[1]),
                    'd_tipo_asenta' => utf8_encode($data[2]),
                    'D_mnpio' => utf8_encode($data[3]),
                    'd_estado' => utf8_encode($data[4]),
                    'd_ciudad' => utf8_encode($data[5]),
                    'd_CP' => utf8_encode($data[6]),
                    'c_estado' => $data[7],
                    'c_oficina' => $data[8],
                    'c_CP' => $data[9],
                    'c_tipo_asenta' => $data[10],
                    'c_mnpio' => $data[11],
                    'id_asenta_cpcons' => $data[12],
                    'd_zona' => $data[13],
                    'c_cve_ciudad' => $data[14],
                ]);
            }
        } 
    }


    /**
     * Obtiene el código postal solicitado
     * 
     * @param string $code
     * @return mixed
     */
    public function zip_codes($code) 
    {
        $codes = array();
        $settlements = array();

        // Consulta de código postal
        $zipcodes = DB::table('zip_codes')
            ->select('id', 'd_codigo', 'd_asenta', 'd_ciudad', 'd_tipo_asenta', 'D_mnpio', 'd_estado', 'd_CP', 'd_zona')
            ->where('d_codigo', $code)->get();


        // Se arma el arreglo
        foreach ($zipcodes as $code) {
            $settlements[] = [
                'name' => $code->d_asenta,
                'zone_type' => $code->d_zona,
                'settlement_type' => ['name' => $code->d_tipo_asenta]
            ];

            $codes = array(
                'zip_code' => $code->d_codigo,
                'locality' => $code->d_ciudad,
                'federal_entity' => array(
                    'name' => $code->d_estado,
                    'code' => $code->d_CP,
                ),
                'settlements' => $settlements,
                'municipality' => ['name' => $code->D_mnpio]
            );
        }

        return response()->json($codes);
    }
}
