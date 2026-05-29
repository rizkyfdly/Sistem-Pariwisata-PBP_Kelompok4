<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TempatWisata;
use App\Models\Ulasan;

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

    // ===============================
    // SOAP ULASAN
    // ===============================

    // GET ALL ULASAN
    public function getAllUlasan()
    {
        $ulasan = \App\Models\Ulasan::with('user', 'wisata')->get();

        $xml = new \SimpleXMLElement('<ulasan></ulasan>');

        foreach($ulasan as $item){

            $data = $xml->addChild('data');

            $data->addChild('id', $item->id);

            $data->addChild(
                'user',
                $item->user->name ?? '-'
            );

            $data->addChild(
                'wisata',
                $item->wisata->nama_wisata ?? '-'
            );

            $data->addChild(
                'rating',
                $item->rating
            );

            $data->addChild(
                'komentar',
                $item->komentar
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

    // GET ULASAN BY ID
    public function getUlasanById($id)
    {
        $item = \App\Models\Ulasan::with('user', 'wisata')->find($id);

        if(!$item){

            return response(
                '<message>Ulasan tidak ditemukan</message>',
                404
            )->header(
                'Content-Type',
                'text/xml'
            );

        }

        $xml = new \SimpleXMLElement('<ulasan></ulasan>');

        $xml->addChild('id', $item->id);

        $xml->addChild(
            'user',
            $item->user->name ?? '-'
        );

        $xml->addChild(
            'wisata',
            $item->wisata->nama_wisata ?? '-'
        );

        $xml->addChild(
            'rating',
            $item->rating
        );

        $xml->addChild(
            'komentar',
            $item->komentar
        );

        return response(
            $xml->asXML(),
            200
        )->header(
            'Content-Type',
            'text/xml'
        );
    }
}