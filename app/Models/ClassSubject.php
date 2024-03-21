<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;

    protected $guarded = [];

    static public function getRecord()
    {
        $return = self::select('class_subjects.*','clas.name as class_name','subjects.name as subject_name','users.name as created_by_name')
                     ->join('subjects','subjects.id', '=' ,'class_subjects.subject_id')
                     ->join('clas','clas.id','=','class_subjects.class_id')
                     ->join('users','users.id', '=' ,'class_subjects.created_by')
                     ->where('class_subjects.is_delete', '=' ,0);
                     if(!empty(request()->get('class_name')))
                     {
                         $return = $return->where('clas.name','like','%'.request()->get('class_name').'%');
                     }

                     if(!empty(request()->get('subject_name')))
                     {
                         $return = $return->where('subjects.name','like','%'.request()->get('subject_name').'%');
                     }

                     if(!empty(request()->get('date')))
                     {
                         $return = $return->whereDate('class_subjects.created_at','=',request()->get('date'));
                     }

                     $return = $return->orderby('class_subjects.id','desc')
                     ->paginate(20);
        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getClass()
    {
        $return =  Clas::select('clas.*')
        ->join('users','users.id','clas.created_by')
        ->where('clas.is_delete', '=' ,0)
        ->where('clas.status', '=' ,0)
        ->orderBy('clas.id','asc')
        ->get();
        return $return;
    }

    static public function getSubject()
    {
        $return = Subject::select('subjects.*')
                 ->join('users','users.id','subjects.created_by')
                 ->where('subjects.is_delete','=',0)
                 ->where('subjects.status','=',0)
                 ->orderBy('subjects.id','asc')
                 ->paginate(20);
        return $return;
    }

    static public function getAlreadyFirst($class_id,$subject_id)
    {
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }

    static public function getAssignSubjectID($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
    }

    static public function deleteSubject($class_id)
    {
        return self::where('class_id','=',$class_id)->delete();
    }
}
