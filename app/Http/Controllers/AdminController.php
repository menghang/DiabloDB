<?php

namespace DiabloDB\Http\Controllers;

use \Auth;
use DiabloDB\Http\Middleware\Administrator;

/**
 * Class AdminController
 * @package DiabloDB\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Require administrator to access this controller.
     */
    public function __construct()
    {
        $this->middleware('DiabloDB\Http\Middleware\Administrator');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('admin/index', $data);
    }
}
