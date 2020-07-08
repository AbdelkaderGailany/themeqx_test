<?php

Auth::routes();
Route::get('clear', 'HomeController@clearCache')->name('clear_cache');
Route::get('/', ['as' => 'home', 'uses'=>'HomeController@index']);
Route::resource('user', 'UserController');
//Account activating
Route::get('account/activating/{activation_code}', ['as' => 'email_activation_link', 'uses'=>'UserController@activatingAccount']);

//Listing page
Route::get('page/{slug}', ['as' => 'single_page', 'uses'=>'PostController@showPage']);
Route::get('listing', ['as' => 'listing', 'uses'=>'AdsController@listing']);
Route::get('ad/{id}/{slug?}', ['as' => 'single_ad', 'uses'=>'AdsController@singleAd']);
Route::get('embedded/{slug}', ['as' => 'embedded_ad', 'uses'=>'AdsController@embeddedAd']);
Route::post('save-ad-as-favorite', ['as' => 'save_ad_as_favorite', 'uses'=>'UserController@saveAdAsFavorite']);
Route::post('report-post', ['as' => 'report_ads_pos', 'uses'=>'AdsController@reportAds']);
Route::post('reply-by-email', ['as' => 'reply_by_email_post', 'uses'=>'UserController@replyByEmailPost']);
// Password reset routes...
Route::post('send-password-reset-link', ['as' => 'send_reset_link', 'uses'=>'Auth\PasswordController@postEmail']);
//Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
//Route::post('password/reset', ['as'=>'password_reset_post', 'uses'=>'Auth\PasswordController@postReset']);

Route::post('get-sub-category-by-category', ['as'=>'get_sub_category_by_category', 'uses' => 'AdsController@getSubCategoryByCategory']);
Route::post('get-brand-by-category', ['as'=>'get_brand_by_category', 'uses' => 'AdsController@getBrandByCategory']);
Route::post('get-category-info', ['as'=>'get_category_info', 'uses' => 'AdsController@getParentCategoryInfo']);
Route::post('get-state-by-country', ['as'=>'get_state_by_country', 'uses' => 'AdsController@getStateByCountry']);
Route::post('get-city-by-state', ['as'=>'get_city_by_state', 'uses' => 'AdsController@getCityByState']);
Route::post('switch/product-view', ['as'=>'switch_grid_list_view', 'uses' => 'AdsController@switchGridListView']);



Route::group(['prefix'=>'login'], function(){
    //Native login route
    Route::get('/', ['as' => 'login', 'uses'=>'UserController@login']);
    Route::post('/', ['uses'=>'UserController@loginPost']);
    //Social login route
    Route::get('facebook', ['as' => 'facebook_redirect', 'uses'=>'SocialLogin@redirectFacebook']);
    Route::get('facebook-callback', ['as' => 'facebook_callback', 'uses'=>'SocialLogin@callbackFacebook']);
    Route::get('google', ['as' => 'google_redirect', 'uses'=>'SocialLogin@redirectGoogle']);
    Route::get('google-callback', ['as' => 'google_callback', 'uses'=>'SocialLogin@callbackGoogle']);

});



//Dashboard Route
Route::group(['prefix'=>'dashboard', 'middleware' => 'dashboard'], function(){
    Route::get('/', ['as'=>'dashboard', 'uses' => 'DashboardController@dashboard']);

    Route::group(['middleware'=>'only_admin_access'], function(){
        Route::group(['prefix'=>'settings'], function(){
            Route::get('theme-settings', ['as'=>'theme_settings', 'uses' => 'SettingsController@ThemeSettings']);
            Route::get('modern-theme-settings', ['as'=>'modern_theme_settings', 'uses' => 'SettingsController@modernThemeSettings']);
            Route::get('general', ['as'=>'general_settings', 'uses' => 'SettingsController@GeneralSettings']);
            Route::get('ad', ['as'=>'ad_settings', 'uses' => 'SettingsController@AdSettings']);
            Route::get('storage', ['as'=>'file_storage_settings', 'uses' => 'SettingsController@StorageSettings']);
            Route::get('social', ['as'=>'social_settings', 'uses' => 'SettingsController@SocialSettings']);
            Route::get('blog', ['as'=>'blog_settings', 'uses' => 'SettingsController@BlogSettings']);
            Route::get('other', ['as'=>'other_settings', 'uses' => 'SettingsController@OtherSettings']);
            Route::post('other', ['uses' => 'SettingsController@OtherSettingsPost']);
            //Save settings / options
            Route::post('save-settings', ['as'=>'save_settings', 'uses' => 'SettingsController@update']);
        });
        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', ['as'=>'parent_categories', 'uses' => 'CategoriesController@index']);
            Route::post('/', ['uses' => 'CategoriesController@store']);
            Route::get('edit/{id}', ['as'=>'edit_categories', 'uses' => 'CategoriesController@edit']);
            Route::post('edit/{id}', ['uses' => 'CategoriesController@update']);
            Route::post('delete-categories', ['as'=>'delete_categories', 'uses' => 'CategoriesController@destroy']);
        });
        Route::group(['prefix'=>'distances'], function(){
            Route::get('/', ['as'=>'admin_brands', 'uses' => 'BrandsController@index']);
            Route::post('/', ['uses' => 'BrandsController@store']);
            Route::get('edit/{id}', ['as'=>'edit_brands', 'uses' => 'BrandsController@edit']);
            Route::post('edit/{id}', ['uses' => 'BrandsController@update']);
            Route::post('delete-distances', ['as'=>'delete_brands', 'uses' => 'BrandsController@destroy']);
        });
        
       
        Route::get('approved', ['as'=>'approved_ads', 'uses' => 'AdsController@index']);
        Route::get('pending', ['as'=>'admin_pending_ads', 'uses' => 'AdsController@adminPendingAds']);
        Route::get('blocked', ['as'=>'admin_blocked_ads', 'uses' => 'AdsController@adminBlockedAds']);
        Route::post('status-change', ['as'=>'ads_status_change', 'uses' => 'AdsController@adStatusChange']);
        Route::get('ad-reports', ['as'=>'ad_reports', 'uses' => 'AdsController@reports']);
        Route::get('users', ['as'=>'users', 'uses' => 'UserController@index']);
        Route::get('users-info/{id}', ['as'=>'user_info', 'uses' => 'UserController@userInfo']);
        Route::post('change-user-status', ['as'=>'change_user_status', 'uses' => 'UserController@changeStatus']);
        Route::post('change-user-feature', ['as'=>'change_user_feature', 'uses' => 'UserController@changeFeature']);
        Route::post('delete-reports', ['as'=>'delete_report', 'uses' => 'AdsController@deleteReports']);
        
        Route::group(['prefix'=>'administrators'], function(){
            Route::get('/', ['as'=>'administrators', 'uses' => 'UserController@administrators']);
            Route::get('create', ['as'=>'add_administrator', 'uses' => 'UserController@addAdministrator']);
            Route::post('create', ['uses' => 'UserController@storeAdministrator']);

            Route::post('block-unblock', ['as'=>'administratorBlockUnblock','uses' => 'UserController@administratorBlockUnblock']);
        });
    });
    Route::group(['prefix'=>'u'], function(){
        Route::group(['prefix'=>'posts'], function(){
            Route::get('/', ['as'=>'my_ads', 'uses' => 'AdsController@myAds']);
            Route::get('create', ['as'=>'create_ad', 'uses' => 'AdsController@create']);
            Route::post('create', ['uses' => 'AdsController@store']);
            Route::post('delete', ['as'=>'delete_ads', 'uses' => 'AdsController@destroy']);
            Route::get('edit/{id}', ['as'=>'edit_ad', 'uses' => 'AdsController@edit']);
            Route::post('edit/{id}', ['uses' => 'AdsController@update']);
            Route::get('favorite-lists', ['as'=>'favorite_ads', 'uses' => 'AdsController@favoriteAds']);
            //Upload ads image
            Route::post('upload-a-image', ['as'=>'upload_ads_image', 'uses' => 'AdsController@uploadAdsImage']);
            Route::post('upload-post-image', ['as'=>'upload_post_image', 'uses' => 'PostController@uploadPostImage']);
            //Delete media
            Route::post('delete-media', ['as'=>'delete_media', 'uses' => 'AdsController@deleteMedia']);
            Route::post('feature-media-creating', ['as'=>'feature_media_creating_ads', 'uses' => 'AdsController@featureMediaCreatingAds']);
            Route::get('append-media-image', ['as'=>'append_media_image', 'uses' => 'AdsController@appendMediaImage']);
            Route::get('append-post-media-image', ['as'=>'append_post_media_image', 'uses' => 'PostController@appendPostMediaImage']);
            Route::get('pending-lists', ['as'=>'pending_ads', 'uses' => 'AdsController@pendingAds']);
            Route::get('archive-lists', ['as'=>'favourite_ad', 'uses' => 'AdsController@create']);
            Route::get('reports-by/{slug}', ['as'=>'reports_by_ads', 'uses' => 'AdsController@reportsByAds']);
            Route::get('profile', ['as'=>'profile', 'uses' => 'UserController@profile']);
            Route::get('profile/edit', ['as'=>'profile_edit', 'uses' => 'UserController@profileEdit']);
            Route::post('profile/edit', ['uses' => 'UserController@profileEditPost']);
            Route::get('profile/change-avatar', ['as'=>'change_avatar', 'uses' => 'UserController@changeAvatar']);
            Route::post('upload-avatar', ['as'=>'upload_avatar',  'uses' => 'UserController@uploadAvatar']);
            /**
             * Change Password route
             */
            Route::group(['prefix' => 'account'], function() {
                Route::get('change-password', ['as' => 'change_password', 'uses' => 'UserController@changePassword']);
                Route::post('change-password', 'UserController@changePasswordPost');
            });

        });
    });

    Route::get('logout', ['as'=>'get_logout', 'uses' => 'DashboardController@logout']);
});