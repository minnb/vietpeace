<?php
namespace App\Utils;
class CacheDataService 
{
  public static function CheckCacheData($name_cache){
    if(Cache::get($name_cache)){
      return Cache::get($name_cache);
    }else{
      return 0;
    }
  }

  public static function GetCacheData($data, $name_cache, $minute){
    $cache = [];
    if(Cache::get($name_cache))
    {
        $cache = Cache::get($name_cache);
    }else{
        $cache = Cache::add($name_cache, $data->toArray(), $minute);
    }
    return $cache;
  }

}
