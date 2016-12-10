<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
      protected $fillable = array('openid','sex','headimgurl','country','province','city','nickname','tel','lastip');
}
