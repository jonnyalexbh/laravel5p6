<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use File;

class ReadFileController extends ApiController
{
    /**
     * index
     *
     */
    public function index()
    {
        $file = File::get(storage_path('app/' . 'factura2.txt'));
        $file = explode(PHP_EOL, $file);

        foreach ($file as $linea_num => $linea) {

            $data = explode('|', $linea);

            switch (substr($data[0], 0, 1)) {
                case 'H':
                    $result = $this->header($data);
                    break;

                case 'P':
                    $result['conceptos'][] = $this->product($data);
            }

        }
        return $result;
    }

    /**
     * header document
     *
     */
    private function header($data)
    {
        $result['tipoDocumento'] = ['codigo' => $data[1]];
        $result['cliente'] = [
            'tipoDePersona' => ['codigo' => $data[2]],
            'razonSocial' => $data[3],
            'nombrePersonalizado' => $data[4],
            'tipoDocumento' => ['codigo' => $data[5]],
            'numeroDocumento' => $data[6],
            'tipoRegimen' => ['codigo' => $data[7]],
            'pais' => ['codigo' => $data[8]],
            'departamento' => $data[9],
            'municipio' => $data[10],
            'direccion' => $data[11],
            'telefono' => $data[12],
            'correo' => $data[13],
            'granContribuyente' => $data[14],
            'empresa' => ['numeroIdentificacion' => $data[15]],
            'nombre' => $data[16],
            'apellidos' => $data[17],
        ];
        $result['informacionAdicional'] = 'Factura de venta';
        $result['numeracion'] = ['codigo' => $data[18]];
        $result['numeroDocumento'] = $data[19];
        $result['fechaEmision'] = $data[20];
        $result['horaEmision'] = $data[21];
        $result['empresa'] = ['numeroIdentificacion' => $data[22]];
        $result['sucursal'] = ['codigo' => $data[23]];
        $result['nota'] = $data[24];
        $result['fechaVencimiento'] = $data[25];
        $result['fechaGeneracion'] = $data[26];
        $result['medioPago'] = ['codigo' => $data[27]];
        $result['estatusPago'] = $data[28];
        $result['subtotal'] = $data[29];
        $result['impuesto'] = $data[30];
        $result['descuento'] = $data[31];
        $result['moneda'] = ['codigo' => $data[31]];

        return $result;
    }
    /**
     * product
     *
     */
    private function product($data)
    {
        return [
            'producto' => $data[1],
            'cantidad' => $data[2],
            'descripcion' => $data[3],
            'valorUnitario' => $data[4],
            'porcentajeImpuesto' => $data[5],
            'valorImpuesto' => $data[6],
            'impuesto' => ['codigo' => $data[7]],
            'descuento' => $data[8],
            'unidadMedida' => ['codigo' => $data[9]],
        ];
    }
}
