<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;

class TestRequestController extends Controller
{
    //
    public function create(){
        return view('request_test');
    }

    public function store(StoreUserRequest $request){
        // $name = $request->input('name');
        // $email = $request->input('email','default@example.com');
        // $allData = $request->all();
        // $onlyNameAndEmail = $request->only(['name','email']);
        // $exceptPassword = $request->except('password');
        // if($request->has('name')){
        //     //name필드가 존재하고 비어있지 않은 경우
        // }
        // if($request->hasfile('profile_picture')&& $request->file('profile_picture')->isValid()){
        //     $file=$request->file('profile_picture');
        //     $path = $file->store('uploads/profiles');
        //     $originalName = $file->getClientOriginalName();
        // }else{
        //     $path = '파일 없음';
        // }

        // $requestPath = $request->path();
        // $requestUrl = $request->url();
        // $requestMethod = $request->method();
        // $uesrAgent = $request->header('User-Agent');

        $validateData = $request->validated();

        $name=$request->input('name');
        $email=$request->input('email');

        // dd([
        //     'name'=>$name,
        //     'email'=>$email,
        //     'allData'=>$allData,
        //     'onlyNameAndEmail'=>$onlyNameAndEmail,
        //     'exceptPassword'=>$exceptPassword,
        //     'filePath'=>$path,
        //     'requestPath'=>$requestPath,
        //     'requestUrl'=>$requestUrl,
        //     'requestMethod'=>$requestMethod,
        //     'userAgent'=>$uesrAgent
        // ]);
        dd('유효성 검사 통과!', $validateData);
    }
}
