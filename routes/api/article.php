<?php

Route::group(['prefix'=>'v1','namespace'=>'Api'],function(){

      //文章列表页
        Route::get('articles','ArticleController@index');
        //文章添加
    Route::post('articles','ArticleController@add');

});