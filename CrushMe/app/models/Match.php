<?php
/**
 * Created by PhpStorm.
 * User: Spencer
 * Date: 4/7/2016
 * Time: 10:23 AM
 */


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Match extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'matches';

    protected $fillable = ['username', 'crushimg', 'yes', 'no'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

//    public static $rules = array(
//        'username'=>'required|unique:user,username',
//        'emailaddress'=>'required|email',
//        'password'=>'required| min:6|confirmed',
//        'password_confirmation'=>'required| min:6'
//    );
//
//    //validate for registration
//    public static function validate($data){
//        return Validator::make($data, static::$rules);
//    }
//
//    public static $logrules = array(
//        'emailaddress'=>'required|email',
//        'password'=>'required| min:6',
//    );

    //validate for login
//    public static function validlogin($data){
//        return Validator::make($data, static::$logrules);
//    }

}
