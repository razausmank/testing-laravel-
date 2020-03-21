<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function completed(){
        $this->body = "Yeah this is an excellent technique dude";
        $this->completed= true ;
        $this->save() ;
    }
}
