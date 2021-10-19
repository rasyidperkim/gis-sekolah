<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function kecamatan()
    {

        $kecamatan = Kecamatan::orderBy('name', 'ASC');

        return DataTables::eloquent($kecamatan)
            ->addColumn('action', 'admin.kecamatan.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
