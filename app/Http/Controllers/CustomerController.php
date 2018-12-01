<?php

namespace App\Http\Controllers;

use App\ShopOwner;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function searchShop()
    {
        $index = ShopOwner::select('ShopOwnerId','ShopName','ShopImg','ShopType','MapShopOwner')->get();
        return view('component.ShopListDetail')->with("shop",$index);
    }

    public function listshop()
    {
        $data = DB::table('HistoryTransaction')->distinct()
            ->join('ShopOwner', 'HistoryTransaction.ShopOwnerId', '=', 'ShopOwner.ShopOwnerId')
            ->select('ShopOwner.ShopName as shopname', 'ShopOwner.ShopImg as shopimg','HistoryTransaction.ShopOwnerId as ShopOwnerId')
            ->get();

        return view('component.rightMenu')
            ->with('data',$data)
            ;
    }

    public function callStar(Request $request)
    {
        $stampCreate = DB::table('HistoryTransaction')
            ->join('ShopOwner', 'HistoryTransaction.ShopOwnerId', '=', 'ShopOwner.ShopOwnerId')
            ->select('HistoryTransaction.ActionHT','HistoryTransaction.StampHT as stampplus')
            ->where('HistoryTransaction.ActionHT','=','create')
            ->where('HistoryTransaction.CustomerId','=','1')
            ->where('HistoryTransaction.ShopOwnerId','=',$request->input('shopid'))
            ->get();
        if(! $stampCreate ->isEmpty()){
            foreach ($stampCreate as $stampCreates){
                $starplus = $stampCreates->stampplus;
            }
        }else{
            $starplus = 0;
        }



        $stampDelete = DB::table('HistoryTransaction')
            ->join('ShopOwner', 'HistoryTransaction.ShopOwnerId', '=', 'ShopOwner.ShopOwnerId')
            ->select('HistoryTransaction.ActionHT','HistoryTransaction.StampHT as stampminus')
            ->where('HistoryTransaction.ActionHT','=','delete')
            ->where('HistoryTransaction.CustomerId','=','1')
            ->where('HistoryTransaction.ShopOwnerId','=',$request->input('shopid'))
            ->get();

        if(! $stampDelete ->isEmpty()){
            foreach ($stampDelete as $stampDeletes){
                $starminus = $stampDeletes->stampminus;
            }
        }else{
            $starminus = 0;
        }

        return ['Shop-Id'=>$request->input('shopid'),'stamp'=>$starplus-$starminus];
    }

}
