<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    static public function getRecord()
    {
        $return = self::select('subjects.*','users.name as created_by_name')
                 ->join('users','users.id','subjects.created_by')
                 ->where('subjects.is_delete','=',0);

                 if(!empty(request()->get('name')))
                 {
                      $return = $return->where('subjects.name','like','%'.request()->get('name').'%');
                 }

                 if(!empty(request()->get('date')))
                 {
                      $return = $return->whereDate('subjects.created_at','=',request()->get('date'));
                 }

        $return = $return->orderBy('subjects.id','desc')
                 ->paginate(20);
        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
