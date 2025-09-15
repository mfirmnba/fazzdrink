<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function nearestBranch(Request $request)
    {
        $lat = $request->query('lat');
        $lng = $request->query('lng');

        // Pastikan parameter lat dan lng valid
        if (!$lat || !$lng) {
            return response()->json(['error' => 'Latitude dan Longitude dibutuhkan'], 400);
        }

        $branch = Branch::select('*')
            ->selectRaw("
                (6371 * acos(
                    cos(radians(?)) 
                    * cos(radians(latitude)) 
                    * cos(radians(longitude) - radians(?)) 
                    + sin(radians(?)) 
                    * sin(radians(latitude))
                )) AS distance", [$lat, $lng, $lat])
            ->orderBy('distance', 'asc')
            ->first();

        if ($branch) {
            return response()->json([
                'name' => $branch->name,
                'whatsapp_number' => $branch->whatsapp_number,
                'latitude' => $branch->latitude,
                'longitude' => $branch->longitude
            ]);
        } else {
            return response()->json(['error' => 'Cabang tidak ditemukan'], 404);
        }
    }

}
