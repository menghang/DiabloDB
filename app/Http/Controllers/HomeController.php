<?php

namespace DiabloDB\Http\Controllers;

use \Auth;
use DiabloDB\Character;
use DiabloDB\Diablo\CharacterClass;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $data = [
            'sitename' => \Config::get('diablo.sitename'),
            'characters' => Character::with('member', 'stats')->get(),
            'user' => Auth::user(),
            'ClassHelper' => new CharacterClass()
        ];
        return view('home', $data);
    }

    public function profile()
    {
        $data = [
            'sitename' => \Config::get('diablo.sitename'),
            'user' => Auth::user()
        ];
        return view('user/home', $data);
    }
}
