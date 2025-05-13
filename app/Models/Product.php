<?php

namespace App\Models;

use App\Http\Controllers\Utility\ModelUtil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Constraint\IsNull;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Product extends Model
{
    protected $primaryKey = 'p_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $appends = ['p_img_url', 'p_detail_page_url'];

    function shop(){
        return $this->belongsTo(Shop::class);
    }

    function getNewKey(){
        $p = self::select('p_id')->orderBy('p_id', 'desc')->take(1)->first()->p_id;
        return ModelUtil::getNewPrimaryKey($p);
    }

    function getPImgUrlAttribute(){
        Log::debug("message", [$this->p_img]);
        if(empty($this->p_img)){
            Log::debug("message", ['noImg.png']);
            return asset('img/noimg.png');
        }
        return asset('img/product/'.$this->p_img);
    }

    function getPDetailPageUrlAttribute(){
        return route('pdetail.index', ['productId'=>$this->p_id]);
    }

    function getCategoryAndGroupName(){
        $data = ModelUtil::getCategoryAndGroup($this->c_id);
        if(empty($data)){
            return '';
        }
        return $data['group_name'].'・'.$data['category_name'];
    }
}
