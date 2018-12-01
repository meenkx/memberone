@extends("layouts.app")

@section("content")
    {{--<section class="container-fluid">--}}
    <div class="row MarginZero" style="width: 100%">
        <div class="col-9">
            <section id="advertisement" style="margin-top: 25px">
                <div class="row" style="padding-left: 15px ; padding-right: 15px ; text-align: center; height: 150px">
                    <div class="col-4 tcd">
                        <div class="shadow-md">Advertising</div>
                    </div>
                    <div class="col-4 tcd">
                        <div class="shadow-md">Advertising</div>
                    </div>
                    <div class="col-4 tcd">
                        <div class="shadow-md">Advertising</div>
                    </div>
                </div>
            </section>
            <div style="overflow: hidden !important; height: 67vh">
                <iframe src="{{route('searchShop')}}" frameborder="0" width="100%" height="100%" style="overflow-x: hidden !important;"></iframe>
            </div>
        </div>
        {{--right menu--}}
        <div class="col-3" style="border-left: 1px solid black; text-align: center">
            {{--@include("component/rightMenu")--}}
            <iframe src="{{ route('listshop') }}" style="width: 100%;height: 100%;"></iframe>
        </div>
    </div>
    {{--</section>--}}
@endsection
