<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;

    protected $guarded = [];

    static public function getRecord()
    {
        $return =  self::select('clas.*','users.name as created_by_name')
        ->join('users','users.id','clas.created_by')
        ->where('clas.is_delete', '=' ,0);

        if(!empty(request()->get('name')))
        {
            $return = $return->where('clas.name','like','%'.request()->get('name').'%');
        }

        if(!empty(request()->get('date')))
        {
            $return = $return->whereDate('clas.created_at','=',request()->get('date'));
        }

        $return = $return->orderBy('clas.id','desc')
        ->paginate(20);
        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
