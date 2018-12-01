<?php

namespace App\Http\Controllers;

use App\ShopOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Bodunde\GoogleGeocoder\Geocoder;

class MapController extends Controller
{
    //

    public function searchShopList(Request $request)
    {
//        $data = ShopOwner::select("shopowner")
//            ->where("ShopName","LIKE","%{$request->input('query')}%")
//            ->get();
        $shop = DB::table('ShopOwner')
            ->select('ShopName', 'MapShopOwner')->get();

////        foreach ($data as $datas){
////            $data_shopowner[] = $datas->ShopName;
////        }
////        return response()->json($data_shopowner);

        return view('map')->with("shop",$shop);
    }


}
