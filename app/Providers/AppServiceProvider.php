<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //


        View::composer(['pages.*'],function($view){

          
                $view->with('categories',Category::where('active',1)->orderBy('id','desc')->get());
            
          

        });

        View::composer(['pages.*'],function($view){

           if(request()->has('cat') && request('cat') !=0){
            
                $view->with('todos',Todo::where('category_id',request('cat'))->where('active',1)->orderBy('id','desc')->get());
                
            }else{
                 $view->with('todos',Todo::where('active',1)->orderBy('id','desc')->get());
            }
        });

    }
}
