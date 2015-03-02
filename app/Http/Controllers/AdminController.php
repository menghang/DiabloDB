<?php

namespace DiabloDB\Http\Controllers;

use \Auth;
use DiabloDB\Character;
use DiabloDB\Member;
use DiabloDB\Http\Middleware\Administrator;
use DiabloDB\User;

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
        $userCount = User::where('id', '>=', 1)->count();
        $memberCount = Member::where('id', '>=', 1)->count();
        $charCount = Character::where('id', '>=', 1)->count();

        $data = [
            'user' => Auth::user(),
            'dashboard' => [
                'counters' => [
                    'users'      => ['title' => 'Users', 'value' => $userCount, 'url' => ''],
                    'members'    => ['title' => 'Members', 'value' => $memberCount, 'url' => ''],
                    'characters' => ['title' => 'Characters', 'value' => $charCount, 'url' => ''],
                ]
            ]
        ];
        return view('admin/index', $data);
    }

    /**
     * Member listing
     * @return \Illuminate\View\View
     */
    public function members()
    {
        $data = [
            'user' => Auth::user(),
            'fields' => [
                'name' => ['type' => 'text', 'min' => 2, 'max' => 30],
                'battletag' => ['type' => 'text', 'min' => 4, 'max' => 20],
            ],
            'endpoint' => \URL::route('member.post'),
            'container' => 'memberForm',
            'success' => "location.reload();",
            'button' => 'addMember',
            'title' => 'Add Member',
            'members' => Member::all()
        ];
        return view('admin/members/index', $data);
    }
}
