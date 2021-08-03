<?php
namespace App\Http\Controllers;
use Session;


class TestController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function setcookie()
    {
        //Session::put('variableName', 'asdfasdfasdf');

      return view('welcome');

      //return $response;
    }

    public function getcookie(){
        
        //echo $request->cookie('state');
        return Session::get('jackfrank613@gmail.com');
 
    }

}
