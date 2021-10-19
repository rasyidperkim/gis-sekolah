<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->Kecamatan = new Kecamatan();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $this->Kecamatan->AllData(),
        ];

        return view('admin.kecamatan.v_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Add Data Kecamatan',
            'kecamatan' => $this->Kecamatan->AllData(),
        ];

        return view('admin.kecamatan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate(
            [
                'kecamatan' => 'required | unique:kecamatan'
            ],
            [
                'kecamatan.required' => 'Wajib Diisi',
                'kecamatan.unique' => 'Sudah Ada Data Kecamatan Tersebut',
            ]
        );

        // $this->validate($request, [
        //     'kecamatan' => 'required | unique:kecamatan'
        // ]);

        // Kecamatan::create($request->only('kecamatan'));

        // return redirect()->route('kecamatan.index')
        //     ->with('success', 'Data Kecamatan Berhasil Ditambahkan');
    }

    public function insert()
    {
        Request()->validate(
            [
                'kecamatan' => 'required | unique:kecamatan'
            ],
            [
                'kecamatan.required' => 'Wajib Diisi',
                'kecamatan.unique' => 'Sudah Ada Data Kecamatan Tersebut',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('admin.kecamatan.edit', [
            'title' => 'Ubah Data Kecamatan',
            'kecamatan' => $this->Kecamatan->AllData(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $this->validate($request, [
            'kecamatan' => 'required | unique:kecamatan'
        ]);

        $kecamatan->update($request->only('kecamatan'));

        return redirect()->route('kecamatan.index')
            ->with('info', 'Data Kecamatan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')
            ->with('danger', 'Data Penulis Berhasil Dihapus');
    }
}
