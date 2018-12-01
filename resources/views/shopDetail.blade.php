@extends("layouts.shop")

@section("content")

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row" style="background-image: linear-gradient(#FDE2E2,#A6E5F0) ;height:110%">
        @foreach($data as $datas)
        <div class="col-6">
            <div>
                <nav style="display:flex;vertical-align:middle;align-content:center;margin:30px;border-radius:100px;justify-content:center;background-color:white">
                <img src="{{ $datas->ShopImg }}" alt=""
                     style="background-color:white;margin:10px 10px;border-radius:100px;padding:5px;width:100px;height:100px"/>
                <nav style="display:flex;vertical-align:middle;align-items:center;font-size:40px;justify-content:center;margin-left:40px">{{ $datas->ShopName }}</nav>
                </nav>
            </div>
            <div>
                <nav style="margin:30px;background-color:white;border-radius:10px;paddingLeft:50px;padding:20px">
                <span>ประเถทร้าน : {{$datas->ShopType}}</span>

                </nav>
            </div>
            <div style="margin:30px;background-color:white;padding:20px;border-radius:10px">
            <nav>Information :
                <button type="button" class="btn btn-primary" onclick="document.getElementById('information').style.display='block'">
                    <i class="fas fa-edit"></i> แก้ใขข้อมูลส่วนนี้
                </button>
            </nav>
            <textarea style="width: 100%;border: 1px solid;border-radius: 10px;padding: 10px;margin-top: 10px">{{$datas->ShopAddress}}</textarea>
        </div>
        </div>
        <div class="col-6">
            <div style="margin:30px;background-color:white;padding:20px;border-radius:10px">
            <nav>
                รูปหน้าปก :
                <button type="button" class="btn btn-primary" onclick="document.getElementById('picture').style.display='block'">
                    <i class="fas fa-edit"></i> แก้ใขข้อมูลส่วนนี้
                </button>
            </nav>
            <nav style="margin-top: 30px">
                <img src="{{$datas->ShopCover}}">
            </nav>
        </div>
        <div style="margin:30px;background-color:white;padding:20px;border-radius:10px">
        <div class="row">
            <div class="col-6">
                <span style="fontSize:25px">Promotion</span>
            </div>
            <div class="col-6" style="text-align:right;font-size:25px">
                <button type="button" class="btn btn-primary" onclick="window.location.href = '/shop/Promotion'">
                    <i class="fas fa-plus"></i> แก้ใขข้อมูลส่วนนี้
                </button>

        </div>
        </div>
        </div>

            @foreach($promo as $promos)
                <section>
                    <div style="margin:20px 65px;background-color:white;padding:20px;border-radius:10px">
                        <nav style="color:#CE2929;fontSize:25px">{{$promos->PromotionName}}</nav>
                        <nav>แต้มที่ต้องใช้ : {{$promos->PointPromotion}} แต้ม | ครบ {{$promos->StampPromotion}} ดาว</nav>
                        <nav style="color:#CE2929">ลายละเอียด</nav>
                        <nav>
                            <textarea style="width: 100%;border: 1px solid;border-radius: 10px;padding: 10px;">{{$promos->PromotionDetail}}</textarea>
                        </nav>
                    </div>
                </section>
            @endforeach
        </div>
        @endforeach
    </div>


    <!-- Information -->
    <div id="information" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container" style="padding: 40px 0px">
                <span onclick="document.getElementById('information').style.display='none'" class="w3-button w3-display-topright" style="font-size: 30px;">X</span>
                <nav style="text-align: center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo brand mini" style="margin-left: 20px; width: 180px; margin-top: 15px" />
                    <div style="font-size: 20px; margin-top: 20px">
                        <p>เข้าสู่ระบบเพื่อเริ่มสะสมคะแนน หรือ </p>
                        <p>ดูคะแนนของคุณบน <img src="{{ asset('img/logomini.png') }}" style="width: 100px" /></p>
                    </div>
                    <nav style="font-size: 40px; color: #EA8A8A; font-weight: bold">Edit information</nav>

                    <form  style="display: inline-grid;width: 500px;" method="POST" action="/shop/editInformation">
                        @csrf
                        <nav style="margin-top: 20px; display: inline-flex">
                            <textarea style="width: 100%;border: 1px solid;border-radius: 10px;padding: 10px;" name="information" id="information"></textarea>
                        </nav>
                        <input type="hidden" name="shopid" id="shopid" value="4">
                        <nav style="margin-top: 40px; margin-right: auto !important; width: 100%; text-align: right">
                            <button type="submit" class="btn btn-danger" style="width: 100%; color: white">Submit</button>
                        </nav>
                    </form>

                </nav>
            </div>
        </div>
    </div>

    <!-- picture -->
    <div id="picture" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container" style="padding: 40px 0px">
                <span onclick="document.getElementById('picture').style.display='none'" class="w3-button w3-display-topright" style="font-size: 30px;">X</span>
                <nav style="text-align: center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo brand mini" style="margin-left: 20px; width: 180px; margin-top: 15px" />
                    <div style="font-size: 20px; margin-top: 20px">
                        <p>เข้าสู่ระบบเพื่อเริ่มสะสมคะแนน หรือ </p>
                        <p>ดูคะแนนของคุณบน <img src="{{ asset('img/logomini.png') }}" style="width: 100px" /></p>
                    </div>
                    <nav style="font-size: 40px; color: #EA8A8A; font-weight: bold">Edit picture</nav>

                    <form  style="display: inline-grid; width: 500px;" method="post" action="{{ route('editPicture') }}">
                        @csrf
                        <nav style="margin-top: 20px; display: inline-flex">
                            <i class="fas fa-camera-retro" style="font-size: 50px"></i>
                            <input type="text" class="form-control shadow-md {{ $errors->has('name') ? ' is-invalid' : '' }}" id="picturee" name="picturee" placeholder="picture url here" value="{{ old('name') }}" required autofocus style="border-radius: 20px; padding-left: 20px;width: 100%;margin-left: 20px;height: 50px" />
                        </nav>
                        <input type="hidden" name="shopid" id="shopid" value="4">
                        <nav style="margin-top: 40px; margin-right: auto !important; width: 100%; text-align: right">
                            <button type="submit" class="btn btn-danger" style="width: 100%; color: white">Submit</button>
                        </nav>
                    </form>

                </nav>
            </div>
        </div>
    </div>

@endsection