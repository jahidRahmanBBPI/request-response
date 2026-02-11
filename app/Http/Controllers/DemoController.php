<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    function DemoAction(){
        return "This is my first request-response";
    }

    function parameter(Request $request){
        // return "first route parameter";
        // print_r($request->all());
        $name = $request->name;
        $age = $request->age;
        return "My name is = {$name} and my age is ={$age}";
    }

    function json(Request $request){
        // data in postman
        // {
        //     "name": "Jahid",
        //     "age": 22,
        //     "message": "Hello, Jahid! You are 22 years old.",
        //     "address":{
        //         "city":"Dhaka",
        // "country": "Bangladesh"
        //     },
        //     "hobbies": ["Reading", "Gaming", "Coding"],
        //     "education": {
        // "degree": "BSc"
        //     }
        // }

        return $request->input();
    }

    function data_pass_header(Request $request){
        $name = $request->header('name');
        $age = $request->header('age');
        
        return "My name is {$name} & my age {$age}";
    }

    function data_pass_header_and_body(Request $request){
        $token = $request->header('token');
        $city = $request->input('city');
        $country = $request->input('country');
        $name = $request->name;
        $age = $request->age;

        return array(
            "token"=>$token,
            "city"=>$city,
            "country"=>$country,
            "name"=>$name,
            "age"=>$age,
        );
    }

    function multipart_form_data(Request $request){
        $photoFile = $request->file('photo');
        $FileSize = filesize($photoFile);
        $fileTempName = $photoFile->getFilename();
        $fileType = filetype($photoFile);
        $fileOriginalName = $photoFile->getClientOriginalPath();
        $FileExtension = $photoFile->extension();

        return array(
            "Filesize"=>$FileSize,
            "fileTempName"=>$fileTempName,
            "fileType"=>$fileType,
            "fileOriginalName"=>$fileOriginalName,
            "FileExtension"=>$FileExtension,
        );
    }

    function photo_upload(Request $request){
        $photoFile = $request->file('photo');
        // $photoFile->storeAs('upload', $photoFile->getClientOriginalName(), 'public');

        // dd($request->all(), $request->file('photo'));
        // print_r($request->hasFile('photo'));




        $photoFile->move(public_path('uploads'), $photoFile->getClientOriginalName());

        
        return true;
        // print_r($photoFile);
        // return 'hello';

        // if(!$request->hasFile('photo')){
        // return 'No file received';
        // }

        // $photoFile = $request->file('photo');

        // $photoFile->storeAs(
        //     'upload',
        //     $photoFile->getClientOriginalName(),
        //     'public'
        // );

        // return 'Upload success';


    }

    function read_ip_address(Request $request){
        // return $request->ip(); // For IP
        // return $request->getAcceptableContentTypes(); // ip aceptable data.

        if($request->accepts(['text/html'])){
            return true;
        }else{
            return false;
        }
        
    }

    function cookie_set(Request $request){
        return $request->cookie('Cookie_6');
    }

    function return_type(Request $request){
        // return "Bangladesh";
        // return true;
        // return 100;
        // return array("a", "b", "c");
        // return array(
        //     "A" => "Dhaka",
        //     "B" => "City",
        //     "C" => "House No"
        // );

        $myArray=array(
            array(
                "A" => "Dhaka",
                "B" => "City",
                "C" => "House No"
            ),
            array(
                "A" => "Dhaka",
                "B" => "City",
                "C" => "House No"
            ),
            array(
                "A" => "Dhaka",
                "B" => "City",
                "C" => "House No"
            )
        );
        // return $myArray;
    }

    function json_return(Request $request):JsonResponse{

        $code = 403;
        $content = array('name' => 'Jahid', 'city' => 'London');
        return response()->json($content, $code);
    }

    function redirect_response(){
        // return "Route 01";
        return redirect("/route2");
    }

    function redirect_response2(){
        // return "Route 02";
        echo 'hello';
    }

    function res_File_Binary(){
        $filePath = "uploads/image.png";
        return response()->file($filePath);
    }

    function res_file_download(){
        $filePath = "uploads/image.png";
        return response()->download($filePath);
    }

    function cookie_response(){
        $name = "token";
        $value = "123xyz";
        $minutes = 120;
        $path = "/";
        $domain = $_SERVER['SERVER_NAME'];
        $secure = true;
        $httpOnly = true;

        return response("cookie set successfully")->withCookie(
            cookie($name,
            $value,
            $minutes,
            $path,
            $domain,
            $secure,
            $httpOnly)
        );
    }

    function response_header(){
        return response("Hello")->header('key1', 'MD.')->header('key2', 'jahid')->header('key3', 'Rahman');
    }

    function response_view(){
        return view('page.Home');
    }
}
