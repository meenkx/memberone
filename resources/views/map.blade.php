

@extends("layouts.app")

@section("content")

    <section class="container-fluid">
        <div class="row MarginZero" style="width: 100%;height: 87vh">
            <div class="col-12" style="margin-top: 30px">
                <label for="users" style="font-size: 18px">เลือกร้านค้าที่ร่วมบริการ</label>
                <select name="shopSelect" id="shopSelect" class="form-control shopSelect" style="font-size: 18px">
                    <option disabled selected style="font-size: 18px">-เลือกร้านค้าที่ร่วมบริการ-</option>
                    @foreach($shop as $shops)
                        <option data-id="{{ $shops->MapShopOwner }}" value="{{ $shops->MapShopOwner }}">{{ $shops->ShopName }}</option>
                    @endforeach
                </select>
                <div>
                    <nav style="margin-top: 10px">
                        <span style="font-size: 18px">ห่างจากคุณเป็นระยะทาง : </span>
                        <span style="font-size: 18px" type="text" id="distance"></span>
                    </nav>
                </div>
                <div id="map" style="margin-top: 40px;height: 80%;"></div>
            </div>
        </div>
    </section>

@endsection
