<?php

namespace Modules\Org\Entities;

use Modules\Org\Entities\Office;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "org-departments";
    protected $fillable = ['school_id','name','code','option','description'];

    // public $table_attributes = ['name','code','school','description'];
    // public $table_attribute_relations = ['name','code','school.name'];
    
    public function school(){
        return $this->belongsTo('Modules\Org\Entities\School');
    }

    // public function groups(){
    //     return $this->morphMany('Modules\Org\Entities\Group', 'institution');
    // }

    public function roles(){
        return $this->morphMany('App\Role', 'rolegiver');
    }

    public function getOfficeAttribute(){
        // return "ss";
        foreach (Office::all() as $office) {
            $type =  $office->option['institution_type']; 
            $id =  $office->option['institution_id'];
            if($type == "Org\\Department" && $id == $this->id){
                return $office;
            }
        }
        return null;
    }

}
