@extends("layouts.shop")

@section("content")
    <section class="container-fluid">
        <div class="row MarginZero" style="width: 100%;height: 87vh">
            <div class="col-12" style="margin-top: auto;margin-bottom: auto;text-align: center">
                <nav style="font-size: 70px;color: #005590">ร้าน 4 ป้า</nav>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(450)->generate('4')) !!} ">
            </div>
        </div>
    </section>

@endsection