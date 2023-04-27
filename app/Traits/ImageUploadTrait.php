<?php

namespace App\Traits;


trait ImageUploadTrait{

    public function imageUpload($image , $directory){
      $image_extention = $image->getClientOriginalExtension();

      $image_name= time().'_'. 'mmmmmmmmmmmm' .'.'.$image_extention;

      if (! is_dir($directory)) {
        mkdir($directory , 0777 ,true);
      }

      $image->move($directory ,$image_name );
      return $directory.'/'. $image_name;
    }
}
