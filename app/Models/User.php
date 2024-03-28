<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getAdmin()
    {
        $return =  self::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete','=',0);

            if(!empty(request()->get('name')))
            {
                 $return = $return->where('name','like','%'.request()->get('name').'%');
            }

            if(!empty(request()->get('email')))
            {
                 $return = $return->where('email','like','%'.request()->get('email').'%');
            }

            if(!empty(request()->get('date')))
            {
                 $return = $return->whereDate('created_at','=',request()->get('date'));
            }

        $return =  $return->orderBy('id', 'desc')
            ->paginate(3);
            return $return;
    }

    static public function getTeacher()
    {
        $return =  self::select('users.*')
        ->where('users.user_type', '=', 2)
        ->where('users.is_delete','=',0);
        if(!empty(request()->get('name')))
        {
            $return = $return->where('users.name','like','%'.request()->get('name').'%');
        }

        if(!empty(request()->get('last_name')))
        {
            $return = $return->where('users.last_name','like','%'.request()->get('last_name').'%');
        }

        if(!empty(request()->get('email')))
        {
            $return = $return->where('users.email','like','%'.request()->get('email').'%');
        }

        if(!empty(request()->get('admission_number')))
        {
            $return = $return->where('users.admission_number','like','%'.request()->get('admission_number').'%');
        }

        if(!empty(request()->get('address')))
        {
            $return = $return->where('users.address','like','%'.request()->get('address').'%');
        }

        if(!empty(request()->get('roll_number')))
        {
            $return = $return->where('users.roll_number','like','%'.request()->get('roll_number').'%');
        }

        if(!empty(request()->get('class')))
        {
            $return = $return->where('clas.name','like','%'.request()->get('class').'%');
        }

        if(!empty(request()->get('gender')))
        {
            $return = $return->where('users.gender','like','%'.request()->get('gender').'%');
        }

        if(!empty(request()->get('status')))
        {
            $status = (request()->get('status')) == 100 ? 0 : 1;
            $return = $return->where('users.status','=',$status);
        }

        if(!empty(request()->get('admission_date')))
        {
            $return = $return->whereDate('users.admission_date','=',request()->get('admission_date'));
        }

        if(!empty(request()->get('date-of_joining')))
        {
            $return = $return->whereDate('users.date-of_joining','=',request()->get('date-of_joining'));
        }

        if(!empty(request()->get('date')))
        {
            $return = $return->whereDate('users.created_at','=',request()->get('date'));
        }

$return =  $return->orderBy('users.id', 'desc')
        ->paginate(20);
return $return;
    }

    static public function getStudent()
    {
        $return =  self::select('users.*','clas.name as class_name','parent.name as parent_name','parent.last_name as parent_last_name')
                ->join('users as parent','parent.id' ,'=', 'users.parent_id','left')
                ->join('clas','clas.id' ,'=', 'users.class_id','left')
                ->where('users.user_type', '=', 3)
                ->where('users.is_delete','=',0);
                if(!empty(request()->get('name')))
                {
                    $return = $return->where('clas.name','like','%'.request()->get('name').'%');
                }

                if(!empty(request()->get('last_name')))
                {
                    $return = $return->where('users.last_name','like','%'.request()->get('last_name').'%');
                }

                if(!empty(request()->get('email')))
                {
                    $return = $return->where('users.email','like','%'.request()->get('email').'%');
                }

                if(!empty(request()->get('admission_number')))
                {
                    $return = $return->where('users.admission_number','like','%'.request()->get('admission_number').'%');
                }

                if(!empty(request()->get('mobile_number')))
                {
                    $return = $return->where('users.roll_number','like','%'.request()->get('mobile_number').'%');
                }

                if(!empty(request()->get('roll_number')))
                {
                    $return = $return->where('users.roll_number','like','%'.request()->get('roll_number').'%');
                }

                if(!empty(request()->get('class')))
                {
                    $return = $return->where('clas.name','like','%'.request()->get('class').'%');
                }

                if(!empty(request()->get('gender')))
                {
                    $return = $return->where('users.gender','like','%'.request()->get('gender').'%');
                }

                if(!empty(request()->get('status')))
                {
                    $status = (request()->get('status')) == 100 ? 0 : 1;
                    $return = $return->where('users.status','=',$status);
                }

                if(!empty(request()->get('admission_date')))
                {
                    $return = $return->whereDate('users.admission_date','=',request()->get('admission_date'));
                }

                if(!empty(request()->get('date')))
                {
                    $return = $return->whereDate('users.created_at','=',request()->get('date'));
                }

        $return =  $return->orderBy('users.id', 'desc')
                ->paginate(20);
        return $return;
    }

    static public function getMyStudent($parentID)
    {
        $return =  self::select('users.*','clas.name as class_name','parent.name as parent_name','parent.last_name as parent_last_name')
        ->join('users as parent','parent.id' ,'=', 'users.parent_id','left')
        ->join('clas','clas.id' ,'=', 'users.class_id','left')
        ->where('users.user_type', '=', 3)
        ->where('users.parent_id','=',$parentID)
        ->where('users.is_delete','=',0)
        ->orderBy('users.id', 'desc')
        ->paginate(20);
return $return;
    }

    static public function getSearchStudent()
    {
        if(!empty(request()->get('id')) || !empty(request()->get('name')) || !empty(request()->get('last_name')) || !empty(request()->get('email')))
        {
            $return =  self::select('users.*','clas.name as class_name','parent.name as parent_name')
            ->join('users as parent','parent.id' ,'=', 'users.parent_id','left')
            ->join('clas','clas.id' ,'=', 'users.class_id','left')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete','=',0);
            if(!empty(request()->get('id')))
            {
                $return = $return->where('users.id','like','%'.request()->get('id').'%');
            }

            if(!empty(request()->get('name')))
            {
                $return = $return->where('users.name','like','%'.request()->get('name').'%');
            }

            if(!empty(request()->get('last_name')))
            {
                $return = $return->where('users.last_name','like','%'.request()->get('last_name').'%');
            }

            if(!empty(request()->get('email')))
            {
                $return = $return->where('users.email','like','%'.request()->get('email').'%');
            }

    $return =  $return->orderBy('users.id', 'desc')
            ->paginate(20);
    return $return;
        }
    }

    static public function getParent()
    {
        $return =  self::select('users.*')
        ->where('users.user_type', '=', 4)
        ->where('users.is_delete','=',0);
        if(!empty(request()->get('name')))
        {
            $return = $return->where('users.name','like','%'.request()->get('name').'%');
        }

        if(!empty(request()->get('last_name')))
        {
            $return = $return->where('users.last_name','like','%'.request()->get('last_name').'%');
        }

        if(!empty(request()->get('email')))
        {
            $return = $return->where('users.email','like','%'.request()->get('email').'%');
        }

        if(!empty(request()->get('occupation')))
        {
            $return = $return->where('users.occupation','like','%'.request()->get('occupation').'%');
        }

        if(!empty(request()->get('address')))
        {
            $return = $return->where('users.address','like','%'.request()->get('address').'%');
        }

        if(!empty(request()->get('mobile_number')))
        {
            $return = $return->where('users.mobile_number','like','%'.request()->get('mobile_number').'%');
        }

        if(!empty(request()->get('gender')))
        {
            $return = $return->where('users.gender','like','%'.request()->get('gender').'%');
        }

        if(!empty(request()->get('status')))
        {
            $status = (request()->get('status')) == 100 ? 0 : 1;
            $return = $return->where('users.status','=',$status);
        }

        if(!empty(request()->get('date')))
        {
            $return = $return->whereDate('users.created_at','=',request()->get('date'));
        }

        $return =  $return->orderBy('users.id', 'desc')
                ->paginate(20);
        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

}
