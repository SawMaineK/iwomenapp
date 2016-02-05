<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'objectId',
                            'username',
                            'password',
                            'email',
                            'facebookId',
                            'isTlgTownshipExit',
                            'isTestAcc',
                            'phoneNo',
                            'profileimage',
                            'searchName',
                            'tlg_city_address',
                            'user_profile_img',
                            'updatedAt',
                            'registerBODname',
                            'userImgPath',
                        ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
