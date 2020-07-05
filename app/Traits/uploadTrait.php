<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait UploadTrait
{
    public function uploadOne($folder,$image,$ext,$dataBasefilename)
    {
      $name = rand(101, 99999) . "_" .time() . "." . $ext;
      if (!empty($dataBasefilename)) {
        unlink($folder . $dataBasefilename);
    }
     
      $image->move($folder, $name);
      return $name;

}
public function uploadOneAdmin($folder,$image,$ext,$dataBasefilename){
  $name = rand(101, 99999) . "_" .time() . "." . $ext;
  if (!empty($dataBasefilename)) {
    unlink($folder . $dataBasefilename);
}
  $image_resize = Image::make($image->getRealPath());              
  $image_resize->resize(200, 200);
  $image->storeAs('public/user_image',$name);
  // Storage::disk('local')->put($folder, $name);

  //$image_resize->save(public_path($folder .$name));
  return $name;
}



public function uploadOneBanner($folder,$image,$ext,$dataBasefilename){
  $name = rand(101, 99999) . "_" .time() . "." . $ext;
  if (!empty($dataBasefilename)) {
    unlink($folder . $dataBasefilename);
}
  $image_resize = Image::make($image->getRealPath());              
  $image_resize->resize(2637, 700);
  $image_resize->save(public_path($folder .$name));
  return $name;
}



}

?>