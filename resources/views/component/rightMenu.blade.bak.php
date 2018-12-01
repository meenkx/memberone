@guest
<img src="{{ asset('img/logo.png') }}" alt="Logo brand mini" style="margin-left: 20px; width: 180px; margin-top: 60px" />
<div style="font-size: 20px; margin-top: 20px">
    <p>เข้าสู่ระบบเพื่อเริ่มสะสมคะแนน หรือ </p>
    <p>ดูคะแนนของคุณบน <img src="{{ asset('img/logomini.png') }}" style="width: 100px" /></p>
</div>
<div style="margin-top: 50px">

    <nav style="font-size: 40px; color: #EA8A8A; font-weight: bold">Login</nav>

    <form>
        @csrf
        <nav style="margin-top: 20px; display: inline-flex">
            <img src="{{ asset('img/user.png') }}"  style="width: 40px; height: 40px; margin-right: 20px" />
            <input  type="text" class="form-control shadow-md {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email" value="shop@shop.com" required autofocus style="border-radius: 20px; width: 250px; padding-left: 20px" />
        </nav>
        @if ($errors->has('email'))
            <nav style="margin-top: 20px; display: inline-flex">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            </nav>
        @endif
        <nav style="margin-top: 20px; display: inline-flex">
            <img src="{{ asset('img/lock.png') }}"  style="width: 40px; height: 40px; margin-right: 20px" />
            <input  type="password" class="form-control shadow-md {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password" value="shop1234" style="border-radius: 20px; width: 250px; padding-left: 20px" />
        </nav>
        @if ($errors->has('password'))
            <nav style="margin-top: 20px; display: inline-flex">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            </nav>
        @endif

        <nav style="margin-top: 20px; margin-right: auto !important; width: 90%; text-align: right">
            <button type="submit" class="btn btn-danger" style="width: 72%; color: white">Submit</button>
            {{--@if (Route::has('password.request'))--}}
                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                    {{--{{ __('Forgot Your Password?') }}--}}
                {{--</a>--}}
            {{--@endif--}}
        </nav>
    </form>

    <hr />
    <div style="margin-top: 50px">
        <span style="cursor: none">Forget Password |</span>
        <button type="button" class="btn " style="width: 100px; color: white; background-color: #EA8A8A;margin-left:10px" onclick="document.getElementById('singUp').style.display='block'">Sing up</button>
        <button type="button" class="btn " style="width: 110px; color: white; background-color: #0086FA;margin-left:10px;cursor: none" >Facebook</button>
    </div>

    <div id="singUp" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container" style="padding: 40px 0px">
                <span onclick="document.getElementById('singUp').style.display='none'" class="w3-button w3-display-topright" style="font-size: 30px;">X</span>
                <nav>
                    <img src="{{ asset('img/logo.png') }}" alt="Logo brand mini" style="margin-left: 20px; width: 180px; margin-top: 15px" />
                    <div style="font-size: 20px; margin-top: 20px">
                        <p>เข้าสู่ระบบเพื่อเริ่มสะสมคะแนน หรือ </p>
                        <p>ดูคะแนนของคุณบน <img src="{{ asset('img/logomini.png') }}" style="width: 100px" /></p>
                    </div>
                    <nav style="font-size: 40px; color: #EA8A8A; font-weight: bold">Register</nav>

                    <form  style="display: inline-grid;">
                        @csrf
                        <nav style="margin-top: 20px; display: inline-flex">
                            <img src="{{ asset('img/user.png') }}"  style="width: 40px; height: 40px; margin-right: 20px" />
                            <input  type="text" class="form-control shadow-md {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="name" value="{{ old('name') }}" required autofocus style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        @if ($errors->has('name'))
                        <nav class="margin-top: 20px; display: inline-flex">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        </nav>
                        @endif

                        <nav style="margin-top: 20px; display: inline-flex">
                            <img src="{{ asset('img/user.png') }}"  style="width: 40px; height: 40px; margin-right: 20px" />
                            <input  type="text" class="form-control shadow-md {{ $errors->has('email') ? ' is-invalid' : '' }}" id="emailRegister" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        @if ($errors->has('email'))
                        <nav style="margin-top: 20px; display: inline-flex">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        </nav>
                        @endif

                        <nav style="margin-top: 20px; display: inline-flex">
                            <img src="{{ asset('img/lock.png') }}"  style="width: 40px; height: 40px; margin-right: 20px" />
                            <input  type="password" class="form-control shadow-md {{ $errors->has('password') ? ' is-invalid' : '' }}" id="passwordRegister" name="password" placeholder="Password" style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        @if ($errors->has('password'))
                        <nav style="margin-top: 20px; display: inline-flex">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        </nav>
                        @endif

                        <nav style="margin-top: 20px; display: inline-flex">
                            <img src="{{ asset('img/lock.png') }}"  style="width: 40px; height: 40px; margin-right: 20px" />
                            <input  type="password" class="form-control shadow-md" id="password-confirm" name="password_confirmation" placeholder="password confirm" style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>
                        <nav style="margin-top: 40px; margin-right: auto !important; width: 100%; text-align: right">
                            <button type="submit" class="btn btn-danger" style="width: 100%; color: white">Submit</button>
                        </nav>
                    </form>

                </nav>
            </div>
        </div>
    </div>
</div>

@else

    {{--{{ Auth::user()->name }}--}}
    <div class="shadow-md" style="background-color: white;width: 100%;margin-top: 30px;">
        <nav style="width: 100%;display: inline-flex;padding: 10px">
            <nav style="width: 50%;text-align: left"><img src="{{ asset('img/logomini.png') }}" style="width: 100px" /></nav>
            <nav style="width: 50%;text-align: right">{{ Auth::user()->name }}</nav>
        </nav>
        <nav style="background-color: #D1F4FA;padding: 10px">
            <nav style="font-size: 25px;color: #EA8A8A;font-weight: bold;">คะแนน : 999,999 แต้ม</nav>
            <hr>
            <img src="{{ asset('/img/menuu.png') }}" alt="">
        </nav>
    </div>
@endguest
