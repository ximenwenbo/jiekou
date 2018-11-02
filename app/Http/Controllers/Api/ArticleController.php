<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Contracts\Validation\Validator;


class ArticleController extends Controller
{
    //文章列表页
    public function index(Request $request){
        //起始位置
        $offset = $request->get('offset',0);
        //获取的最大记录数
        $limit = min($request->get('limit',10),10);
        //获取数据
        $data = Article::offset($offset)->limit($limit)->get();

        return response()->json($data);
    }

    //接收数据处理
    public function add(Request $request)
    {
        //验证
       $a =  Validator::make($request->all(),[
           'title'=>'required'
       ]);
       //验证是否通过
        if(!$a->passes()){
            return response()->json([
                'status'=>10001,
                'message'=>'请求参数不合法'
            ],400);
        }
        //合法
        $model = Article::created($request->all());
        return response()->json($model,201);

    }
}
