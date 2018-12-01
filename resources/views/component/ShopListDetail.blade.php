<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" />
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbpldfy9RKA0dyKispih3k9POKNij2Od8&callback=initMap"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.min.js"></script>
<style>
    body {
        overflow-x:hidden;
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="container-fluid ShopListDetailOverflow">
    <div id="button" style="text-align:right">
        {{----}}
    </div>
    {{--shop available--}}
    <div class="row" style="margin-bottom: 20px">
        {{ $i=0 }}
        @foreach($shop as $shops)
            <div class="shadow-md shopLabel ad_pad">
                <div class="row" style="width: 365px !important">
                    <div class="col-4">
                        {{--<img src="{{ $shops->ShopImg }}" style="top: -30px; position: relative; width: 110px !important" />--}}
                        <img src="https://upload.wikimedia.org/wikipedia/th/4/43/%E0%B9%82%E0%B8%A5%E0%B9%82%E0%B8%81%E0%B9%89%E0%B9%80%E0%B8%84%E0%B9%80%E0%B8%AD%E0%B8%9F%E0%B8%8B%E0%B8%B5.png" style="top: -30px; position: relative; width: 110px !important" />
                    </div>
                    <div class="col-6 rm_pad" style="margin: 10px 0">
                        <nav><h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px">{{ $shops->ShopName }}</h3></nav>
                        <nav>ประเภท : <span>{{ $shops->ShopType }}</span></nav>
                        <nav>จำนวนผู้ใช้ : <span>30,000</span></nav>
                        <nav style="display: flex">คะแนน :
                            <nav style="margin-left: 10px">
                                <img src="{{ asset('/img/star.png') }}" alt="" style="width: 15px">
                                <img src="{{ asset('/img/star.png') }}" alt="" style="width: 15px">
                                <img src="{{ asset('/img/star.png') }}" alt="" style="width: 15px">
                                <img src="{{ asset('/img/star.png') }}" alt="" style="width: 15px">
                                <img src="{{ asset('/img/star.png') }}" alt="" style="width: 15px">
                            </nav>
                        </nav>
                    </div>
                    <div class="col-2 checkList">
                        <label class="custom-control material-checkbox">
                            <input data-title="{{ $i++ }}" id="checkShop" type="checkbox" class="material-control-input" onclick="addShop({{ $shops->ShopOwnerId }})"/>
                            <span class="material-control-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
    function addShop(ck){
        var data = ck;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        axios.post('/shop/addshop', {
            shop: data,
            user: 1,
        })
            .then(function (response) {
                // console.log(response.data);
                if(response.data == 'duplicate'){
                    swal({
                        type: 'error',
                        title: 'ข้อมูลซ้ำ',
                        text: 'คุณมีร้านนี้ในกระเป๋าสะสมแล้ว',
                        footer: '<a href>หากมีปัญหาในการเพิ่มข้อมูลร้าน โปรดติดต่อสอบถาม</a>'
                    })
                }
                else if(response.data == 'success'){
                    swal({
                        type: 'success',
                        title: 'เพิ่มข้อมูลเรียบร้อย',
                        text: 'คุณมีร้านนี้ในกระเป๋าสะสมเรียบร้อย',
                        footer: '<a href>หากมีปัญหาในการเพิ่มข้อมูลร้าน โปรดติดต่อสอบถาม</a>'
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }
</script>

