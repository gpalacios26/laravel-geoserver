<?php

namespace App\Http\Controllers;

use App\Models\Geodata;
use Illuminate\Http\Request;

class GeodataController extends Controller
{
    public function index()
    {
        $all = Geodata::all('id', 'capa', 'nombre', 'latitud', 'longitud');

        if (!$all) {
            return response()->json(['success' => false, 'message' => 'No hay información disponible']);
        }

        return response()->json(['success' => true, 'data' => $all]);
    }

    public function show($id)
    {
        $one = Geodata::find($id, ['id', 'capa', 'nombre', 'latitud', 'longitud']);

        if (!$one) {
            return response()->json(['success' => false, 'message' => 'No hay información disponible']);
        }

        return response()->json(['success' => true, 'data' => $one]);
    }
}
