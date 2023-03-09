<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'checklogout' , 'namespace' => 'Admin'], function () {
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@checklogin');
    Route::match(['get', 'post'], '/forgot', 'LoginController@forgot');

    Route::get('resetpass', 'ResetPassController@resetpass');

});
Route::group(['middleware' => 'checklogin' , 'namespace' => 'Admin'], function () {
    Route::get('/logout', 'LoginController@checklogout');
    Route::get('/', function () {
        return view('admin.index');
    })->middleware(['can:change_user']);

    Route::match(['get', 'post'],'edit/{id}', 'IndexController@edit');
    Route::match(['get', 'post'],'change-pass/{id}', 'IndexController@changePass');

    Route::group(['middleware' => ['can:quanlylienhe']], function () {
        Route::get('contact', 'MailsController@datacontact');
        Route::get('contact/delete/{id}', 'MailsController@delcontact');
    });

    Route::group(['middleware' => ['can:quanlynhantin']], function () {
        Route::get('newsletter', 'MailsController@datanewsletter');
        Route::get('newsletter/delete/{id}', 'MailsController@delnewsletter');
    });

    Route::group(['middleware' => ['can:quanlytaikhoan']], function () {
        Route::get('accounts', 'AccountsController@data');
        Route::match(['get', 'post'],'accounts/add', 'AccountsController@add');
        Route::match(['get', 'post'],'accounts/edit/{id}', 'AccountsController@edit');
        Route::get('accounts/delete/{id}', 'AccountsController@delete');

        Route::get('account-types', 'AccountTypesController@data');
        Route::match(['get', 'post'],'account-types/add', 'AccountTypesController@add');
        Route::match(['get', 'post'],'account-types/edit/{id}', 'AccountTypesController@edit');
        Route::get('account-types/delete/{id}', 'AccountTypesController@delete');
    });

    // News
    Route::group(['middleware' => ['can:quanlytintuc']], function () {
        Route::get('news', 'NewsController@data');
        Route::match(['get', 'post'],'news/add', 'NewsController@add');
        Route::match(['get', 'post'],'news/edit/{id}', 'NewsController@edit');
        Route::get('news/delete/{id}', 'NewsController@delete');
        Route::get('news/deleteMul', 'NewsController@deleteMul');
    });

    // Freetutorials
    Route::group(['middleware' => ['can:quanlyvideo']], function () {
        Route::get('freetutorials', 'FreeTutorialsController@data');
        Route::match(['get', 'post'],'freetutorials/add', 'FreeTutorialsController@add');
        Route::match(['get', 'post'],'freetutorials/edit/{id}', 'FreeTutorialsController@edit');
        Route::get('freetutorials/delete/{id}', 'FreeTutorialsController@delete');
        Route::get('freetutorials/deleteMul', 'FreeTutorialsController@deleteMul');
    });

    // Course
    Route::group(['middleware' => ['can:quanlykhoahoc']], function () {
        // Cấp độ
        Route::get('levels', 'CourseLevelsController@data');
        Route::match(['get', 'post'],'levels/add', 'CourseLevelsController@add');
        Route::match(['get', 'post'],'levels/edit/{id}', 'CourseLevelsController@edit');
        Route::get('levels/delete/{id}', 'CourseLevelsController@delete');
        Route::get('levels/deleteMul', 'CourseLevelsController@deleteMul');

        Route::get('online', 'OnlineCoursesController@data');
        Route::match(['get', 'post'],'online/add', 'OnlineCoursesController@add');
        Route::match(['get', 'post'],'online/edit/{id}', 'OnlineCoursesController@edit');
        Route::get('online/delete/{id}', 'OnlineCoursesController@delete');
        Route::get('online/deleteMul', 'OnlineCoursesController@deleteMul');

        // Coupons
        Route::get('coupons', 'CouponsController@data');
        Route::match(['get', 'post'],'coupons/add', 'CouponsController@add');
        Route::match(['get', 'post'],'coupons/edit/{id}', 'CouponsController@edit');
        Route::get('coupons/delete/{id}', 'CouponsController@delete');
        Route::get('coupons/deleteMul', 'CouponsController@deleteMul');

        Route::get('order-course', 'CheckOutController@data');
        Route::get('order-course/send/{bill_id}', 'CheckOutController@send');
        Route::get('order-course/del/{id}', 'CheckOutController@del');
    });

    Route::group(['middleware' => ['can:quanlylichhoc']], function () {
        // Lịch học
        Route::get('schedules', 'SchedulesController@data');
        Route::match(['get', 'post'],'schedules/add', 'SchedulesController@add');
        Route::match(['get', 'post'],'schedules/edit/{id}', 'SchedulesController@edit');
        Route::get('schedules/delete/{id}', 'SchedulesController@delete');
        Route::get('schedules/deleteMul', 'SchedulesController@deleteMul');
    });

    Route::group(['middleware' => ['can:quanlybanh']], function () {
        // Bánh
        Route::get('cakes', 'CakesController@data');
        Route::match(['get', 'post'],'cakes/add', 'CakesController@add');
        Route::match(['get', 'post'],'cakes/edit/{id}', 'CakesController@edit');
        Route::get('cakes/delete/{id}', 'CakesController@delete');
        Route::get('cakes/deleteMul', 'CakesController@deleteMul');

        // Hình dáng
        Route::get('cake-shapes', 'CakeShapesController@data');
        Route::match(['get', 'post'],'cake-shapes/add', 'CakeShapesController@add');
        Route::match(['get', 'post'],'cake-shapes/edit/{id}', 'CakeShapesController@edit');
        Route::get('cake-shapes/delete/{id}', 'CakeShapesController@delete');
        Route::get('cake-shapes/deleteMul', 'CakeShapesController@deleteMul');

        // Loại bánh
        Route::get('cake-types', 'CakeTypesController@data');
        Route::match(['get', 'post'],'cake-types/add', 'CakeTypesController@add');
        Route::match(['get', 'post'],'cake-types/edit/{id}', 'CakeTypesController@edit');
        Route::get('cake-types/delete/{id}', 'CakeTypesController@delete');
        Route::get('cake-types/deleteMul', 'CakeTypesController@deleteMul');
        // Route::get('cake-types/select', 'CakeTypesController@select');

        // Kích thước bánh
        Route::get('cake-sizes', 'CakeSizesController@data');
        Route::match(['get', 'post'],'cake-sizes/add', 'CakeSizesController@add');
        Route::match(['get', 'post'],'cake-sizes/edit/{id}', 'CakeSizesController@edit');
        Route::get('cake-sizes/delete/{id}', 'CakeSizesController@delete');
        Route::get('cake-sizes/deleteMul', 'CakeSizesController@deleteMul');

        // Đơn bánh
        Route::get('order', 'OrderCakesController@data');
        Route::get('order/send/{bill_id}', 'OrderCakesController@send');
        Route::get('order/del/{id}', 'OrderCakesController@del');
    });

    Route::group(['middleware' => ['can:quanlygiaodien']], function () {
        // Giao diện
        Route::get('pages', 'InterfacesController@data');
        Route::match(['get', 'post'],'pages/edit/{id}', 'InterfacesController@edit');
    });

    Route::group(['middleware' => ['can:quanlydoanhthu']], function () {
        // Giao diện
        Route::get('statictis', 'StatictisController@data');
        Route::post('statictis/course', 'StatictisController@course');
        Route::post('statictis/cake', 'StatictisController@cake');
        Route::post('statictis/statictis', 'StatictisController@statictis');
        Route::get('statictis/test', 'StatictisController@test');
    });

});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::prefix('public')->namespace('User')->group(function () {
        Route::get('index',
                    ['as' => 'index', 'uses' => 'PagesController@data']);
        Route::get('about-me',
                    ['as' => 'about', 'uses' => 'PagesController@about']);
        Route::get('online',
                    ['as' => 'online', 'uses' =>'PagesController@online']);
        Route::get('online/{id}',
                    ['as' => 'onldetail', 'uses' => 'PagesController@ondetail']);
        Route::get('order',
                    ['as' => 'order', 'uses' => 'PagesController@order']);
        Route::get('order/{id}',
                    ['as' => 'ordetail', 'uses' => 'PagesController@orderdetail']);

        Route::get('order/{id}/formorder',
                    ['as' => 'form', 'uses' => 'OrderController@data']);
        Route::match(['get', 'post'],'order/add',
                    ['as' => 'sendorder', 'uses' => 'OrderController@create']);

        Route::get('news',
                    ['as' => 'news', 'uses' => 'PagesController@news']);
        Route::get('news/{id}',
                    ['as' => 'newsdetail', 'uses' =>  'PagesController@newsdetail']);
        Route::get('free-tutorial',
                    ['as' => 'free-tutorial', 'uses' => 'PagesController@free']);
        Route::get('class/{id}', 'PagesController@class');

        Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
        Route::get('send-mail', ['as' => 'send', 'uses' => 'MailsController@sendmail']);
        Route::get('newsletter', ['as' => 'newsletter', 'uses' => 'MailsController@newsletter']);

        Route::get('sign-in',
                    ['as' => 'signin', 'uses' => 'SignInController@data']);
        Route::get('create-account',
                    ['as' => 'create', 'uses' => 'SignInController@create']);
        Route::get('forget',
                    ['as' => 'forget', 'uses' => 'SignInController@forget']);

        Route::get('add-to-cart/{id}', ['as' => 'cart', 'uses' => 'CartController@cart']);
        Route::get('shopping-cart', ['as' => 'cart-index', 'uses' => 'CartController@index']);
        Route::get('shopping-cart/destroy/{id}', ['as' => 'cart-destroy', 'uses' => 'CartController@destroy']);
        Route::get('coupon', ['as' => 'coupon', 'uses' => 'CartController@coupon']);
        Route::get('check-out', ['as' => 'check-out', 'uses' => 'CheckoutController@index']);
        Route::get('coupon/checkout', ['as' => 'cpcheckout', 'uses' => 'CartController@cpcheckout']);
        Route::match(['get', 'post'],'check-out/create', ['as' => 'out-cart', 'uses' => 'CheckoutController@create']);

        // Route::get('send-mail', function () {
        //     $data = [
        //         'title' => 'Mail from ItSolutionStuff.com',
        //         'body' => 'This is for testing email using smtp'
        //     ];

        //     Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\ContactMail($data));

        //     dd("Email is Sent.");
        // });
        Route::get('sign-in/login/{provider}', ['as' => 'login', 'uses' =>'SigninController@redirect']);
        Route::get('sign-in/{provider}/callback','SigninController@callback');
});
Route::get('view', function () {
    return view('user.profile');
});
