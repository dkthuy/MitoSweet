<?php

namespace App\Providers;

use App\Models\Accounts;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use function PHPSTORM_META\type;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('change_user',function(){
            if(Auth::check()){
                $data_user = Auth::user();
                $type = DB::table('account_types')->get();
                view()->share(['data_user'=>$data_user, 'type'=>$type]);
                return true;
            }
        });
        Gate::define('quanlytintuc',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'1') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlylienhe',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'2') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlynhantin',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'3') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlyvideo',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'4') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlylichhoc',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'5') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlygiaodien',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'6') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlykhoahoc',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'7') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlybanh',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'8') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlydoanhthu',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'9') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
        Gate::define('quanlytaikhoan',function(){
            if(Auth::check()){
                $type = Auth::user()->type;
                $type = DB::table('account_types')->where('id',$type)->select('roles')->get();
                $data_user = Auth::user();
                view()->share('data_user',$data_user);
                if(strpos($type,'10') === false){
                    return false;
                }
                else{
                    return true;
                }
            }
        });
    }
}
