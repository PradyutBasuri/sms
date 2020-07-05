<?php
namespace App\Repositories;

use App\Traits\UploadTrait;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\File;
class UserRepository{
    use UploadTrait;
public function index($request){

    $getData=User::orderBy('id','desc')->get();
    return $getData;
}
public function save($request){
    $filePath="";
    if ($request->has('user_image')) {

        $image = $request->file('user_image');
        $folder = 'user_image/';
        $ext = $image->getClientOriginalExtension();
        $name = $this->uploadOneAdmin($folder, $image, $ext, '');
       
        
        $filePath =  $name;
       
      }
      $password = Hash::make($request->con_password);
    $save=User::insert([
        'name'=>$request->input('user_name'),
        'prf_image'=>$filePath,
        'email'=>$request->input('user_email'),
        'mobile_no'=>$request->input('user_mobile_no'),
         'password'=>$password,
        'dob'=>date('Y-m-d', strtotime(str_replace('/', '-', $request->input('user_dob')))),
        'user_type'=>$request->input('user_type'),
    ]);

    return $save;
}

public function update($request){
    $edit_id=$request->edit_id;
    $filePath="";
    if ($request->has('user_image')) {

        $image = $request->file('user_image');
        $folder = 'user_image/';
        $ext = $image->getClientOriginalExtension();
        $name = $this->uploadOneAdmin($folder, $image, $ext, '');
       
        
        $filePath =  $name;
       
      }
      if( $filePath==""){
        $filePath=User::where('id',$edit_id)->value('prf_image');
      }
    $data= ['name'=>$request->input('user_name'),
    'prf_image'=>$filePath,
    'email'=>$request->input('user_email'),
    'mobile_no'=>$request->input('user_mobile_no'),
    
    'dob'=>date('Y-m-d', strtotime(str_replace('/', '-', $request->input('user_dob')))),
    'user_type'=>$request->input('user_type')];

    $update=User::where('id',$edit_id)->update($data);
}
}


?>