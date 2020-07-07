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
                    <h1 class="page-header"> الملف الشخصي  </h1>
                </div> <!-- /.col-lg-12 -->
            </div> <!-- /.row -->
            @endif
            @include('admin.flash_msg')
            <div class="row">
                <div class="col-xs-12">
                    <div class="profile-avatar">
                        <img src="{{ $user->get_gravatar(150) }}" class="img-thumbnail img-circle" />
                    </div>

                    <table class="table table-bordered table-striped">

                        <tr>
                            <th>الأسم</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        
                        <tr>
                            <th>البريد اللأكنروني</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>الجنس</th>
                            <td>{{ ucfirst($user->gender) }}</td>
                        </tr>
                        
                        <tr>
                            <th>رقم الهاتف</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>العنوان</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th>المحافظة</th>
                            <td>
                                @if($user->country)
                                {{ $user->country->country_name }}
                                @endif
                            </td>
                        </tr>
                        
                        <tr>
                            <th>@lang('وقت أنشاء الحساب')</th>
                            <td>{{ $user->signed_up_datetime() }}</td>
                        </tr>
                        <tr>
                            <th>الحاله</th>
                            <td>{{ $user->status_context() }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('profile_edit') }}"><i class="fa fa-pencil-square-o"></i> تعديل </a>
                </div>
            </div>
        </div>   <!-- /#page-wrapper -->
    </div>   <!-- /#wrapper -->
</div> <!-- /#container -->
@endsection

@section('page-js')

@endsection