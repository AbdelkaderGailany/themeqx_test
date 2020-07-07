
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> @lang('app.dashboard')</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bullhorn"></i> @lang('app.my_ads')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>  <a href="{{ route('my_ads') }}">@lang('app.my_ads')</a> </li>
                    <li>  <a href="{{ route('create_ad') }}">@lang('app.post_an_ad')</a> </li>
                    <li>  <a href="{{ route('pending_ads') }}">@lang('app.pending_for_approval')</a> </li>
                    <li>  <a href="{{ route('favorite_ads') }}">@lang('app.favourite_ads')</a> </li>
                </ul>
            </li>

            @if($lUser->is_admin())

            <li> <a href="{{ route('parent_categories') }}"><i class="fa fa-list"></i> @lang('app.categories')</a>  </li>
            <li> <a href="{{ route('admin_brands') }}"><i class="fa fa-adjust"></i> @lang('app.brands')</a>  </li>
            <li>
                <a href="#"><i class="fa fa-bullhorn"></i> @lang('app.ads')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>  <a href="{{ route('approved_ads') }}">@lang('app.approved_ads')</a> </li>
                    <li>  <a href="{{ route('admin_pending_ads') }}">@lang('app.pending_for_approval')</a> </li>
                    <li>  <a href="{{ route('admin_blocked_ads') }}">@lang('app.blocked_ads')</a> </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-rss-square"></i> @lang('app.blog')<span class="fa arrow"></span></a>
                
            </li>
            <li> <a href="{{ route('ad_reports') }}"><i class="fa fa-exclamation"></i> @lang('app.ad_reports')</a>  </li>
            <li> <a href="{{ route('users') }}"><i class="fa fa-users"></i> @lang('app.users')</a>  </li>
                    
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> @lang('app.settings')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{ route('general_settings') }}">@lang('app.general_settings')</a> </li>
                    <li> <a href="{{ route('ad_settings') }}">@lang('app.ad_settings_and_pricing')</a> </li>
                 
                 
                    <li> <a href="{{ route('file_storage_settings') }}">@lang('app.file_storage_settings')</a> </li>
                    <li> <a href="{{ route('social_settings') }}">@lang('app.social_settings')</a> </li>
                 
                    <li> <a href="{{ route('other_settings') }}">@lang('app.other_settings')</a> </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li> <a href="{{ route('administrators') }}"><i class="fa fa-users"></i> @lang('app.administrators')</a>  </li>
            @endif
            <!--  end admin control  -->            
            <li> <a href="{{ route('profile') }}"><i class="fa fa-user"></i> @lang('app.profile')</a>  </li>
            <li> <a href="{{ route('change_password') }}"><i class="fa fa-lock"></i> @lang('app.change_password')</a>  </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
