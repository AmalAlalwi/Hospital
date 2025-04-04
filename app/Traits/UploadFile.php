<?php
namespace App\Traits;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

trait UploadFile{
    public function VerifyAndStoremage(Request $request,$inputName,$folderName,$imageable_id,$imageable_type ){
        if($request->hasFile($inputName)) {
            if (!$request->file($inputName)->isValid()) {
                falsh('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }
            $photo = $request->file($inputName);
            $name = Str::slug($request->input('name'));
            $filename = $name.'.'.$photo->getClientOriginalExtension();
            $image=new Image();
            $image->filename=$filename;
            $image->imageable_id=$imageable_id;
            $image->imageable_type=$imageable_type;
            $image->save();
            return $request->file($inputName)->move(public_path($folderName), $filename);

        }
        return null;
    }
}
