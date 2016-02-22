<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Auth;
use Illuminate\Http\Request;
use Input;

class LoginController extends Controller
{
    protected $loginPath = '/administration';
    protected $redirectTo = '/posts';
    protected $redirectAfterLogout = '/administration';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return redirect('/posts');
        }
        // Auth::logout();
        // return Auth::user()->username;
        return view('login.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        // Auth::logout();
        if(Auth::check()){
            return redirect('/posts');
        }
        // return view('login.login');
        $username=$request->username;
        $password=$request->password;
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $pass  ='Password';
        
        if(Auth::attempt([$field=>$username, 'password'=>$password])){
            return redirect('/posts');
        } else {
            return redirect('/administration')->withWarning('Username or Password is wrong.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/administration');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
