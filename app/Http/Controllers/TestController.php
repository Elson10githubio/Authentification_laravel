<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    /**
     * On ne peut pas acceder sur cette page si on ne pas connecter
     * php artisan make:migration add_admin_column_to_users_table --table=users : pour ajouter nouvelle column sur table users
     */
    public function __construct()
    {
        $this->middleware('auth')->except('woman');
    }

    public function woman(){

        if(! Gate::allows('access_admin')){
            abort(401);
        }
        return view('pages/woman');

    }


    public function man(){
        
        return view('pages/man');
    } 
}
