<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/getReportCategory/{id?}/{type?}', function ($id='',$type=''){
        if ($id==''){
            return \App\Http\Resources\ReportCategory::collection(\App\Model\ReportCategory::all());
        }else{
            if ($type == '='){
                return new \App\Http\Resources\ReportCategory(\App\Model\ReportCategory::find($id));
            }
            if ($type == '!='){
                return \App\Http\Resources\ReportCategory::collection(\App\Model\ReportCategory::all()->where('id','!=',$id));
            }
        }
    });
    $router->resource('report',ReportController::class);
    $router->resource('reportCategory',ReportCategoryController::class);

});
