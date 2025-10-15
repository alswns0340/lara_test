<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseDemoController extends Controller
{
    //
    public function string(){
        return response('Hello',Response::HTTP_OK)
            ->header('Content-Type','text/plain');
    }
    public function view(){
        return view('welcome',['message'=>'뷰에서 전달된 메세지입니다.']);
    }

    public function json(){
        $data = [
            'id' => 1,
            'name' => 'Jane Doe',
            'email' => 'gemini@example.com'
        ];
        return response()->json($data);
    }

    public function download(){
        $filePath = storage_path('app/test.txt');
        $fileName = 'example.txt';

        if(!file_exists($filePath)){
            abort(404,'File not found');
        }

        return response()->download($filePath,$fileName);
    }

    public function redirect(){
        return redirect()->route('response-demo.redirect-target')->with('status','성공');
    }
        
    public function redirectTarget(Request $request){
        $status = session('status');
        
        return "리디렉션 도착! 메세지 : " . ($status ?? '없음');
    }

    
}
