<?php
namespace App\Traits;


 trait Trans { 
  
   public function getTransNameAttribute() {
        return  json_decode($this->name, true)[app()->getLocale()]??'';
    }

   public function getTransSpecialAttribute() {
        return  json_decode($this->special, true)[app()->getLocale()]??'';
    } 

    public function getNameEnAttribute() {
        return  json_decode($this->name, true)['en']??'';
    }

    public function getNameArAttribute() {
        return  json_decode($this->name, true)['ar']??'';
    }

    public function getSpecialEnAttribute() {
        return  json_decode($this->special, true)['en']??'';
    }

    public function getSpecialArAttribute() {
        return  json_decode($this->special, true)['ar']??'';
    } 

    public function setNameAttribute() {
         $name = [
         	'en' => request()->name_en,
         	'ar' => request()->name_ar,
         ];

         $this->attributes['name'] = json_encode($name, JSON_UNESCAPED_UNICODE);
    } 

   public function setSpecialAttribute() {
         $special = [
         	'en' => request()->special_en,
         	'ar' => request()->special_ar,
         ];

         $this->attributes['special'] = json_encode($special, JSON_UNESCAPED_UNICODE);
   } 

    public function setBodyAttribute() {
         $body = [
            'en' => request()->body_en,
            'ar' => request()->body_ar,
         ];

         $this->attributes['body'] = json_encode($body, JSON_UNESCAPED_UNICODE);
   }

    public function getTransBodyAttribute() {
        return  json_decode($this->body, true)[app()->getLocale()]??'';
    }

    public function getBodyEnAttribute() {
        return  json_decode($this->body, true)['en']??'';
    }

    public function getBodyarAttribute() {
        return  json_decode($this->body, true)['ar']??'';
    }
   

   /// *******************************///

    public function getImgPathAttribute() {
        $url = 'https://via.placeholder.com/100x80'; 
        if($this->image) {
          $url = asset('images/'.$this->image->path);
        }
        return $url;
    }
}


