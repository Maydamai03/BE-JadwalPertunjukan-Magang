<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertunjukan;

class PertunjukanController extends Controller
{
    public function index(Request $request) {
        $query = Pertunjukan::query();

        if ($request->lokasi) {
            $query->where('lokasi', 'LIKE', '%' . $request->lokasi . '%');
        }

        if ($request->nama) {
            $query->where('nama', 'LIKE', '%' . $request->nama . '%');
        }

        return $query->get();
    }

    public function store(Request $request) {
        $path = $request->file('gambar')?->store('public/gambar');

        $pertunjukan = Pertunjukan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jadwal' => $request->jadwal,
            'lokasi' => $request->lokasi,
            'gambar' => $path,
            'created_by' => auth()->id(),
        ]);

        return response()->json($pertunjukan);
    }

    public function update(Request $request, $id) {
        $pertunjukan = Pertunjukan::findOrFail($id);
        $pertunjukan->update($request->all());
        return response()->json($pertunjukan);
    }

    public function destroy($id) {
        Pertunjukan::destroy($id);
        return response()->json(['message' => 'Pertunjukan deleted']);
    }
}
