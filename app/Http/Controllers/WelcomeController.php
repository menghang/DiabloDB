<?php namespace DiabloDB\Http\Controllers;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $data = [
            'sitename' => \Config::get('diablo.sitename')
        ];
        $characters = [];
        
        if (count($characters) === 0) {
            return view('welcome', $data);
        } else {
            $data['characters'] = $characters;
            return view('index', $data);
        }
    }
}
