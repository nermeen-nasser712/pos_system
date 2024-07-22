<?php
namespace app\Traits;
use Illuminate\Http\Request;


trait UploadImageTrait{

    public function UploadeImage(Request $request,$folderName)

    {
        
        $file_name=$request->image->getClientOriginalName();
        $path=$request ->image ->storeAs($folderName,$file_name,'uploads_image');
        return $path;
    }

}