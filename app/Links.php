<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    
    public $timestamps = false;
    protected $table = "IDU_REG_LINKS";
    protected $primaryKey = "LINKS_ID";

    public function rol ()
    {
        return $this->belongsTo(Roles::class, 'ROLES_ID');
    }
}
