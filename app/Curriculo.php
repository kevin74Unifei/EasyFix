<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
     protected $fillable = [        
        'curr_idiomas','curr_extra','curr_dataEmit','curr_active',
         'cand_cod','curr_obj_id','curr_obj_type'  
     ];
     
     public function curr_obj(){
        return $this->morphTo();
     }
}
