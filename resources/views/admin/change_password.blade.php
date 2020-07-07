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
                            <h1 class="page-header"> تغيير كلمة المرور </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif
                @include('admin.flash_msg')
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1 col-xs-12">

                        <form action="" class="form-horizontal" method="post"> @csrf

                            <div class="form-group {{ $errors->has('old_password')? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label" for="old_password">@lang('كملة السر الحالية') *</label>
                                <div class="col-sm-9">
                                    <input type="password" name="old_password" id="old_password" class="form-control" value="" autocomplete="off"/>
                                    {!! $errors->has('old_password')? '<p class="help-block"> '.$errors->first('old_password').' </p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('new_password')? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label" for="new_password">@lang('كلمة المرور الجديدة') *</label>
                                <div class="col-sm-9">
                                    <input type="password" name="new_password" id="new_password" class="form-control" value="" autocomplete="off"/>
                                    {!! $errors->has('new_password')? '<p class="help-block"> '.$errors->first('new_password').' </p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('new_password_confirmation')? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label" for="new_password_confirmation">@lang('تاكيد كلمة المرور الحالية') </label>
                                <div class="col-sm-9">
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" value="" autocomplete="off"/>
                                    {!! $errors->has('new_password_confirmation')? '<p class="help-block"> '.$errors->first('new_password_confirmation').' </p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-10">
                                    <button type="submit" class="btn btn-info">@lang('تغيير كلمة المرور')</button>
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

@endsection