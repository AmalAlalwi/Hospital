<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use Translatable;
    use HasFactory;
    protected $fillable = ['email','email_verified_at','password','name','price','phone','appointments','section_id'];
    public $translatedAttributes = ['name','appointments'];
    //get the doctor image
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
