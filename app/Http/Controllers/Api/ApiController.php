<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    //
    function getAreas(Request $request){
        // 地方IDを取得
        $regionId = $request->get('region_id');
        // 都道府県取得
        $prefs = Prefecture::where('r_id', $regionId)->get();
        Log::debug('prefs:', [$prefs->toJson()]);

        return response()->json($prefs);
    }
}
