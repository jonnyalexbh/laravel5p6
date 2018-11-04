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
        $file = File::get(storage_path('app/' . 'doc1.txt'));
        $file = explode(PHP_EOL, $file);

        foreach ($file as $linea_num => $linea) {

            $data = explode('|', $linea);

            switch (substr($linea[0], 0, 1)) {
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
        $result['tipoDocumento'] = ['codigo' => $data[2]];
        $result['cliente'] = [
            'tipoDePersona' => ['codigo' => 1],
            'razonSocial' => 'AEI SAS',
            'nombrePersonalizado' => 'aei',
            'tipoDocumento' => ['codigo' => 11],
            'numeroDocumento' => '001',
            'tipoRegimen' => ['codigo' => 0],
            'pais' => ['codigo' => 'CO'],
            'departamento' => 'Antioquia',
            'municipio' => 'Medellin',
            'direccion' => 'Calle 59',
            'telefono' => '32254312',
            'correo' => 'aei@gmail.com',
            'granContribuyente' => true,
            'empresa' => ['numeroIdentificacion' => 2],
            'nombre' => null,
            'apellidos' => null,
        ];
        $result['informacionAdicional'] = 'Factura de venta';
        $result['numeracion'] = ['codigo' => 29];
        $result['numeroDocumento'] = '001';
        $result['fechaEmision'] = '2018-03-19';
        $result['horaEmision'] = '9:10:00';
        $result['empresa'] = ['numeroIdentificacion' => 1];
        $result['sucursal'] = ['codigo' => 1];
        $result['nota'] = null;
        $result['fechaVencimiento'] = '2018-12-01';
        $result['fechaGeneracion'] = '2018-03-01';
        $result['medioPago'] = ['codigo' => 10];
        $result['estatusPago'] = 'Pagado';
        $result['subtotal'] = '200000';
        $result['impuesto'] = '38000';
        $result['descuento'] = 0;
        $result['moneda'] = ['codigo' => 'COP'];

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
            'descripcion' => '',
            'valorUnitario' => '',
            'porcentajeImpuesto' => '',
            'valorImpuesto' => '',
            'impuesto' => ['codigo' => 1],
            'descuento' => '',
            'unidadMedida' => ['codigo' => 1],
        ];
    }
}
