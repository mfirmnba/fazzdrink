<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all(); // Bisa diganti paginate(10) jika banyak data
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'whatsapp_number' => 'required',
        ]);

        Branch::create($request->all());

        return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil ditambahkan');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'whatsapp_number' => 'required',
        ]);

        $branch->update($request->all());

        return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil diperbarui');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil dihapus');
    }
    public function nearestBranch(Request $request)
    {
        $latitude = $request->get('lat');
        $longitude = $request->get('lng');

        // Validasi input lat dan lng
        if (is_null($latitude) || is_null($longitude)) {
            return response()->json(['error' => 'Koordinat tidak valid'], 400);
        }

        // Cari cabang terdekat (contoh menggunakan jarak)
        $branch = Branch::selectRaw("id, name, whatsapp_number, 
            (ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) / 1000) as distance", [$longitude, $latitude])
            ->having('distance', '<', 50) // Jarak maksimum 50km
            ->orderBy('distance')
            ->first();

        if (!$branch) {
            return response()->json(['error' => 'Cabang tidak ditemukan'], 404);
        }

        return response()->json($branch);
    }

}
