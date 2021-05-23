<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kontrakmk;

class KtmController extends Controller
{
    public function index()
    {
        $kontrakmks = kontrakmk::get();

        return response()->json([
            'success' => true,
            'message' => 'Kontrak ',
            'data' => $kontrakmks
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'semester_id' => 'required|numeric',
        ]);

        $kontrakmks = kontrakmk::create($request->all());

        if ($kontrakmks) {
            return response()->json([
                'success' => true,
                'message' => 'Kontrak berhasil ditambahkan',
                'data' => $kontrakmks
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kontrak gagal ditambahkan',
                'data' => $kontrakmks
            ], 409);
        }
    }

    public function show(int $id)
    {

        $kontrakmks = kontrakmk::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kontrak',
            'data'    => $kontrakmks
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([]);

        $kontrakmk = kontrakmk::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $kontrakmk->update($dataResult);

        return response()->json([
            'success' => true,
            'message' => 'kontrak Berhasil di Updated',
            'data' => $kontrakmk
        ], 200);
    }

    public function destroy($id)
    {
        $cek = kontrakmk::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'kontrak Berhasil di Hapus',
            'data'    => $cek
        ], 200);
    }
}
