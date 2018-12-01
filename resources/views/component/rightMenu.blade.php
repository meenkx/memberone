    @include("component/style")
    @include("component/styleCustom")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body,html{
            overflow-x: hidden !important;
            background-color: transparent;
        }
        ::-webkit-scrollbar-track
        {
            /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
            border-radius: 10px;
            margin-left: 10px;
            /*background-color: #F5F5F5;*/
        }

        ::-webkit-scrollbar
        {
            width: 12px;
            margin-left: 10px;
            /*background-color: #F5F5F5;*/
        }

        ::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            margin-left: 10px;
            /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);*/
            background-color: #C2C2C2;
        }

    </style>
    {{--{{ Auth::user()->name }}--}}
    <div class="shadow-md" style="background-color: white;width: 100%;margin-top: 30px;">
        <nav style="width: 100%;display: inline-flex;padding: 10px">
            <nav style="width: 50%;text-align: left"><img src="{{ asset('img/logomini.png') }}" style="width: 100px" /></nav>
            <nav style="width: 50%;text-align: right;font-size: 18px">Thanamongkhon Yamdej</nav>
        </nav>
        <nav style="background-color: #D1F4FA;padding: 10px">
            <nav style="font-size: 30px;color: #EA8A8A;font-weight: bold;margin-top: 20px;text-align: center">คะแนน : 999,999 แต้ม</nav>
            <hr>
            {{--<img src="{{ asset('/img/menuu.png') }}" alt="">--}}
        </nav>
    </div>

    {{--<img src="{{ asset('/img/star.png') }}" alt="" style="width: 35px;background-color: white;border-radius: 20px">--}}
    {{--<span type="text" style="background-color: white;border-radius: 20px;padding: 12px">10</span>--}}

    @foreach($data as $datas)
    <div class="row" style="margin-top: 40px">
        <div class="col-11 shadow" style="margin: 0px 20px;padding: 0px">
            <nav style="text-align: center;background: linear-gradient(#F1E6EB, #A6E5EF);">
                <img src="{{$datas->shopimg}}" alt="" style="width: 50px">
                <span style="margin-left: 50px;font-size: 30px">{{ $datas->shopname }}</span>
            </nav>
            {{--<nav style="background: linear-gradient(#F1E6EB, #A6E5EF);margin-top: 10px;padding: 10px 0px;text-align: center">--}}
                {{--<script>--}}
                    {{--$.ajaxSetup({--}}
                        {{--headers: {--}}
                            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                        {{--}--}}
                    {{--});--}}
                    {{--axios.post('/customer/callStar', {--}}
                        {{--shopid: '{{ $datas->ShopOwnerId }}',--}}
                    {{--})--}}
                        {{--.then(function (response) {--}}
                            {{--var number = response.data;--}}
                            {{--// console.log(number);--}}
                            {{--if(number == 0){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star0"></object>';}--}}
                            {{--if(number == 1){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star1"></object>';}--}}
                            {{--if(number == 2){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star2"></object>';}--}}
                            {{--if(number == 3){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star3"></object>';}--}}
                            {{--if(number == 4){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star4"></object>';}--}}
                            {{--if(number == 5){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star5"></object>';}--}}
                            {{--if(number == 6){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star6"></object>';}--}}
                            {{--if(number == 7){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star7"></object>';}--}}
                            {{--if(number == 8){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star8"></object>';}--}}
                            {{--if(number == 9){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star9"></object>';}--}}
                            {{--if(number == 10){document.getElementById("star{{ $i++ }}").innerHTML='<object type="text/html" data="/star10"></object>';}--}}
                        {{--})--}}
                        {{--.catch(function (error) {--}}
                            {{--console.log(error);--}}
                        {{--});--}}
                {{--</script>--}}
                {{--<div id="star"></div>--}}
            {{--</nav>--}}
        </div>
    </div>

    @endforeach

    <script>
        <!--
            function timedRefresh(timeoutPeriod) {
                setTimeout("location.reload(true);",timeoutPeriod);
            }
        window.onload = timedRefresh(5000);
        //   -->
    </script>