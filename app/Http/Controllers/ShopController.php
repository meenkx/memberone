<?php

namespace App\Http\Controllers;

use App\Bag;
use App\HistoryTransaction;
use App\ProductFromShop;
use App\Promotion;
use App\ShopOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{


    public function getshopDetail()
    {
//        $query = ShopOwner::select('ShopOwnerId','ShopName','ShopType','ShopImg','ShopCover','ShopAddress','QRcodeShop','MapShopOwner')->where('ShopName', '=','ป้าสี่คน')->get();
//        return view('shopDetail',['data' => $query]);

        $query = DB::table('ProductFromShop')
            ->join('ShopOwner', 'ProductFromShop.ShopOwnerId', '=', 'ShopOwner.ShopOwnerId')
            ->join('Promotion', 'ProductFromShop.PromotionId', '=', 'Promotion.PromotionId')
            ->select('ShopOwner.ShopOwnerId as ShopOwnerId', 'ShopOwner.ShopName as ShopName', 'ShopOwner.ShopImg as ShopImg' , 'ShopOwner.ShopCover as ShopCover','ShopOwner.ShopCover as ShopCover','ShopOwner.ShopAddress as ShopAddress','ShopOwner.ShopType as ShopType')
            ->where('ShopOwner.ShopOwnerId','=',4)
            ->distinct()
            ->get();

        $promo = DB::table('ProductFromShop')
            ->join('ShopOwner', 'ProductFromShop.ShopOwnerId', '=', 'ShopOwner.ShopOwnerId')
            ->join('Promotion', 'ProductFromShop.PromotionId', '=', 'Promotion.PromotionId')
            ->select('Promotion.PromotionName as PromotionName','Promotion.StampPromotion as StampPromotion','Promotion.PointPromotion as PointPromotion','Promotion.PromotionDetail as PromotionDetail','Promotion.PromotionCount as PromotionCount')
            ->where('ShopOwner.ShopOwnerId','=',4)
            ->distinct()
            ->get();
        return view('shopDetail',['data' => $query,'promo'=>$promo]);
    }

    public function addShop(Request $request)
    {
        $checkData = HistoryTransaction::select('CustomerId','ShopOwnerId')
            ->where('CustomerId','=',$request->input('user'))
            ->where('ShopOwnerId','=',$request->input('shop'))
            ->get();
        if($checkData->isEmpty() || $checkData == "" || $checkData == null){
            $shop = HistoryTransaction::insert([
                [
                    'CustomerId' => $request->input('user'),
                    'ShopOwnerId' => $request->input('shop'),
                    'StampHT' => '0',
                    'PointHT' => '0',
                    'ActionHT' => 'create',
                    'StatusHT' => 'active'
                ]
            ]);
            return "success";
        }
        else{
            return "duplicate";
        }

    }

    public function deletePromotion(Request $request)
    {
        DB::table('ProductFromShop')->where('PromotionId','=',$request->input('PromotionId'))->delete();
        Alert::success('success', 'ลบโปรโมชั่นเรียบร้อยครับ');
        return redirect('/shop/editPromotion?user=1&&shopid=4');
    }

    public function addPromotion(Request $request)
    {

        $shop = Promotion::insert([
            [
                'PromotionName' => $request->input('promoname'),
                'PromotionDetail' => $request->input('promodetail'),
                'StampPromotion' => $request->input('stamppromo'),
                'PointPromotion' => $request->input('pointpromo'),
                'PromotionCount' => $request->input('promocount')
            ]
        ]);

        $pp = Promotion::select('PromotionName','PromotionId')->where('PromotionName','=',$request->input('promoname'))->get();
        foreach ($pp as $pps){
            $PromotionId = $pps->PromotionId;
        }

        $shop2 = ProductFromShop::insert([
            [
                'ShopOwnerId' => 4,
                'ProductLineId' => 1,
                'PromotionId' => $PromotionId
            ]
        ]);

        Alert::success('success', 'เพิ่มโปรโมชั่นเรียบร้อยครับ');
        return redirect('/shop/editPromotion?user=1&&shopid=4');
    }

    public function addShopQr(Request $request)
    {
        $checkData = HistoryTransaction::select('CustomerId','ShopOwnerId')
            ->where('CustomerId','=',$request->input('user'))
            ->where('ShopOwnerId','=',$request->input('shop'))
            ->get();
        if($checkData->isEmpty() || $checkData == "" || $checkData == null){
//            return $checkData;
            $check = ShopOwner::select('ShopOwnerId')->where('ShopOwnerId','=',$request->input('shop'))->get();
            if($check->isEmpty() || $check == "" || $check == null){
                return "empty";
            }else{

                $shop = HistoryTransaction::insert([
                    [
                        'CustomerId' => $request->input('user'),
                        'ShopOwnerId' => $request->input('shop'),
                        'StampHT' => '1',
                        'PointHT' => '5',
                        'ActionHT' => 'create',
                        'StatusHT' => 'active'
                    ]
                ]);
                return "success";
            }
        }
        else{
            $shop = HistoryTransaction::insert([
                [
                    'CustomerId' => $request->input('user'),
                    'ShopOwnerId' => $request->input('shop'),
                    'StampHT' => '1',
                    'PointHT' => '5',
                    'ActionHT' => 'create',
                    'StatusHT' => 'active'
                ]
            ]);

            return "success";
        }

    }

    public function editInformation(Request $request)
    {
//        dd($request);
        DB::table('ShopOwner')
            ->where('ShopOwnerId','=',$request->input('shopid'))
            ->update(['ShopAddress' => $request->input('information')]);
        Alert::success('Success Message', 'เปลี่ยนแปลงข้อมูลเรียบร้อยครับ');
        return redirect()->route('Promotion');
    }


    public function editPicture(Request $request)
    {
        DB::table('ShopOwner')
            ->where('ShopOwnerId','=',$request->input('shopid'))
            ->update(['ShopCover' => $request->input('picturee')]);
        return redirect()->route('shopDetail');
    }

    public function editPromotion(Request $request)
    {
        $query = DB::table('ProductFromShop')
            ->join('ShopOwner', 'ProductFromShop.ShopOwnerId', '=', 'ShopOwner.ShopOwnerId')
            ->join('Promotion', 'ProductFromShop.PromotionId', '=', 'Promotion.PromotionId')
            ->select('ShopOwner.ShopOwnerId as ShopOwnerId', 'ShopOwner.ShopName as ShopName', 'ShopOwner.ShopImg as ShopImg' , 'ShopOwner.ShopCover as ShopCover','ShopOwner.ShopCover as ShopCover','ShopOwner.ShopAddress as ShopAddress','ShopOwner.ShopType as ShopType','Promotion.PromotionId as PromotionId','Promotion.PromotionName as PromotionName','Promotion.StampPromotion as StampPromotion','Promotion.PointPromotion as PointPromotion','Promotion.PromotionDetail as PromotionDetail','Promotion.PromotionCount as PromotionCount')
            ->where('ShopOwner.ShopOwnerId','=',4)
            ->get();

//        return datatables($query)->toJson();
        return view('component.editPromotion',['data' => $query]);
    }

    public function saveeditPromotion(Request $request)
    {
        $data = DB::table('Promotion')
            ->where('PromotionId','=', $request->input('PromotionId'))
            ->update(
                [
                    'PromotionName' => $request->input('PromotionName') ,
                    'PromotionDetail' => $request->input('PromotionDetail') ,
                    'StampPromotion' => $request->input('StampPromotion') ,
                    'PointPromotion' => $request->input('PointPromotion') ,
                    'PromotionCount' => $request->input('PromotionCount')
                ]
            );

        return redirect()->to('/shop/editPromotion');
    }
}
