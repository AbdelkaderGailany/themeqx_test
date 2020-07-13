@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')

    <div class="container">

        <div id="wrapper">

            @include('admin.sidebar_menu')

            <div id="page-wrapper">
                @if( ! empty($title))
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> {{ $title }}  </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-xs-12">

                        <form action="" class="form-horizontal" enctype="multipart/form-data" method="post"> @csrf
                        <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" value="{{ old('name')? old('name') : $user->name }}" name="name" placeholder="@lang('app.name')">
                                {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                            </div>
                            <label for="name" class="col-sm-4 control-label">@lang('app.name')</label>
                        </div>

                        <div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" value="{{ old('email')? old('email') : $user->email }}" name="email" placeholder="@lang('app.email')">
                                {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                            </div>
                            <label for="email" class="col-sm-4 control-label">@lang('app.email')</label>
                        </div>

                        <div class="form-group {{ $errors->has('gender')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <select id="gender" name="gender" class="form-control select2">
                                    <option value="">Select Gender</option>
                                    <option value="ذكر" {{ $user->gender == 'ذكر'?'selected':'' }}>Male</option>
                                    <option value="انثى" {{ $user->gender == 'انثى'?'selected':'' }}>Fe-Male</option>
                                   
                                </select>

                                {!! $errors->has('gender')? '<p class="help-block">'.$errors->first('gender').'</p>':'' !!}
                            </div>
                            <label for="gender" class="col-sm-4 control-label">@lang('app.gender')</label>
                        </div>

                        <div class="form-group {{ $errors->has('mobile')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mobile" value="{{ old('mobile')? old('mobile') : $user->mobile }}" name="mobile" placeholder="@lang('app.mobile')">
                                {!! $errors->has('mobile')? '<p class="help-block">'.$errors->first('mobile').'</p>':'' !!}
                            </div>
                            <label for="mobile" class="col-sm-4 control-label">@lang('app.mobile')</label>
                        </div>

                        <div class="form-group {{ $errors->has('phone')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone" value="{{ old('phone')? old('phone') : $user->phone }}" name="phone" placeholder="@lang('app.phone')">
                                {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                            </div>
                            <label for="phone" class="col-sm-4 control-label">@lang('app.phone')</label>
                        </div>


                        <div class="form-group {{ $errors->has('country_id')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <select id="country_id" name="country_id" class="form-control select2">
                                    <option value="">@lang('app.select_a_country')</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':'' !!}
                            </div>
                            <label for="phone" class="col-sm-4 control-label">@lang('app.country')</label>
                        </div>


                        <div class="form-group {{ $errors->has('address')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" value="{{ old('address')? old('address') : $user->address }}" name="address" placeholder="@lang('app.address')">
                                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                            </div>
                            <label for="address" class="col-sm-4 control-label">@lang('app.address')</label>
                        </div>

                        <div class="form-group {{ $errors->has('website')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="website" value="{{ old('website')? old('website') : $user->website }}" name="website" placeholder="@lang('app.website')">
                                {!! $errors->has('website')? '<p class="help-block">'.$errors->first('website').'</p>':'' !!}
                            </div>
                            <label for="website" class="col-sm-4 control-label">@lang('app.website')</label>
                        </div>

                        <div class="form-group  {{ $errors->has('photo')? 'has-error':'' }}">
                            <div class="col-sm-8">
                                <input type="file" id="photo" name="photo" class="filestyle" >
                                {!! $errors->has('photo')? '<p class="help-block">'.$errors->first('photo').'</p>':'' !!}
                            </div>
                            <label class="col-sm-4 control-label">@lang('app.change_avatar')</label>
                        </div>

                        <hr />

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary">@lang('app.edit')</button>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>

            </div>   <!-- /#page-wrapper -->

        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->
@endsection

@section('page-js')
    <script src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>
    <script>
        $(":file").filestyle({buttonName: "btn-primary", buttonBefore: true});
    </script>
@endsection