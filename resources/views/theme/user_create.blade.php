@extends('layout.main')
@section('title') Register | @parent @endsection
@section('main')

    <div class="container">
        <div class="row">
            <div class=" col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-white ">
                    <h4><i class="fa fa-edit"></i> </h4>
                    <p class="intro"> عرض وتعديل وحذف إعلاناتك. </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-white ">
                    <h4><i class="fa fa-clock-o"></i> </h4>
                    <p class="intro"> نشر سريع لإعلانات جديدة مع تفاصيل الاتصال. </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-white ">
                    <h4><i class="fa fa-bar-chart-o"></i> </h4>
                    <p class="intro"> تتبع إعلاناتك المفضلة. </p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-xs-12">

                <div class="login">
                    <h3 class="authTitle">التسجيل  او <a href="{{ route('login') }}" class="btn btn-xl btn-default">@lang('app.login')</a></h3>


                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('registration_success'))
                        <div class="alert alert-success">
                            {{ session('registration_success') }}
                        </div>
                    @endif

                    <form action="{{route('user.store')}}" role="form" method="post"> @csrf

                        <hr />
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('last_name')? 'has-error':'' }} ">
                                    <input type="text" name="last_name" id="last_name" class="form-control"  value="{{ old('last_name') }}" placeholder="الأسم الثاني" tabindex="2">
                                    {!! $errors->has('last_name')? '<p class="help-block">'.$errors->first('last_name').'</p>':'' !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('first_name')? 'has-error':'' }} ">
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="الأسم الاول" tabindex="1">

                                    {!! $errors->has('first_name')? '<p class="help-block">'.$errors->first('first_name').'</p>':'' !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email')? 'has-error':'' }} ">
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="البريد الألكتروني" tabindex="4">
                            {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}

                        </div>

                        <div class="form-group {{ $errors->has('phone')? 'has-error':'' }}">
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="رقم الهاتف" tabindex="3">
                            {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('gender')? 'has-error':'' }}">
                                    <select id="gender" name="gender" class="form-control select2">
                                        <option value="">اختر الجنس</option>
                                        <option value="male">ذكر </option>
                                        <option value="female">انثى</option>
                                    </select>
                                    {!! $errors->has('gender')? '<p class="help-block">'.$errors->first('gender').'</p>':'' !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('country')? 'has-error':'' }}">
                                    <select id="country" name="country" class="form-control select2">
                                        <option value="">@lang('app.select_a_country')</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->has('country')? '<p class="help-block">'.$errors->first('country').'</p>':'' !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('password_confirmation')? 'has-error':'' }}">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" tabindex="6">
                                    {!! $errors->has('password_confirmation')? '<p class="help-block">'.$errors->first('password_confirmation').'</p>':'' !!}

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="كلمة المرور" tabindex="5">
                                    {!! $errors->has('password')? '<p class="help-block">'.$errors->first('password').'</p>':'' !!}

                                </div>
                            </div>
                        </div>
                        <div class="row  {{ $errors->has('password')? 'has-error':'' }}">
                            <div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<label><input type="checkbox" name="agree" value="1" /> أوافق </label>
					</span>
                            </div>
                            <div class="col-xs-8 col-sm-9 col-md-9">
                                 اوافق على شروط و احكام الموقع
                            </div>

                            <div class="col-sm-12">
                                {!! $errors->has('password')? '<p class="help-block">You must agree with terms and condition</p>':'' !!}
                            </div>
                        </div>

                        <hr />
                        <div class="row">
                            <div class="col-xs-12"><input type="submit" value="سجل" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script>
        $(document).ready(function() {
            $('#phone').keyup(function(){
                $(this).val($(this).val().replace(/[^0-9]/g,""));
            });
        });

    </script>
@endsection

