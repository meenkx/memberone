<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    dd(Auth::check());
    return view('index');
});

Route::get('/star0', function () {return view('component.star0');});
Route::get('/star1', function () {return view('component.star1');});
Route::get('/star2', function () {return view('component.star2');});
Route::get('/star3', function () {return view('component.star3');});
Route::get('/star4', function () {return view('component.star4');});
Route::get('/star5', function () {return view('component.star5');});
Route::get('/star6', function () {return view('component.star6');});
Route::get('/star7', function () {return view('component.star7');});
Route::get('/star8', function () {return view('component.star8');});
Route::get('/star9', function () {return view('component.star9');});
Route::get('/star10', function () {return view('component.star10');});

Route::group(['prefix' => 'customer'], function () {
    Route::get('/genpss', function () {
        return Hash::make('shop1234');
    });
    Route::get('/', function () {
//    dd(Auth::check());
        return view('userindex');
    })->name('/');

    Route::get('/index', function () {
        return view('userindex');
    });

    Route::get('/qr', function () {
        return view('qrcode');
    });

    Route::get('/map', 'MapController@searchShopList')->name("searchShopList");

    Route::get('/searchShop', 'CustomerController@searchShop')->name("searchShop");
    Route::get('/listshop', 'CustomerController@listshop')->name("listshop");
//    Route::post('/callStar', 'CustomerController@callStar')->name("callStar");
    Route::get('/callStarGet', 'CustomerController@callStar')->name("callStar");
});

Route::group(['prefix' => 'shop'], function () {

    Route::get('/', function () {
        return view('shopindex');
    })->name('/');

    Route::get('/detail', 'ShopController@getshopDetail')->name('shopDetail');
    Route::post('/addshop', 'ShopController@addShop')->name('addShop');
    Route::post('/editInformation', 'ShopController@editInformation')->name('editInformation');
    Route::post('/editPicture', 'ShopController@editPicture')->name('editPicture');
    Route::get('/editPromotion', 'ShopController@editPromotion')->name('editPromotion');
    Route::post('/saveeditPromotion', 'ShopController@saveeditPromotion')->name('saveeditPromotion');
    Route::get('/Promotion', function () {
        return view('shopeditpromotion');
    })->name('Promotion');
});