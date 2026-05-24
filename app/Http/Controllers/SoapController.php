<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;

class SoapController extends Controller
{
    public function wisata()
    {
        $wisata = TempatWisata::all();

        $xml = new \SimpleXMLElement('<wisata_list/>');

        foreach ($wisata as $item) {

            $data = $xml->addChild('wisata');

            $data->addChild(
                'nama_tempat',
                htmlspecialchars($item->nama_tempat)
            );

            $data->addChild(
                'lokasi',
                htmlspecialchars($item->lokasi)
            );

            $data->addChild(
                'deskripsi',
                htmlspecialchars($item->deskripsi)
            );

            $data->addChild(
                'harga_tiket',
                $item->harga_tiket
            );

        }

        return response(
            $xml->asXML(),
            200
        )->header(
            'Content-Type',
            'text/xml'
        );
    }
}