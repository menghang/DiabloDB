<?php namespace DiabloDB\Http\Controllers;

use DiabloDB\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function storeMember()
    {
        $fields = ['name', 'battletag'];

        $valid = $this->validateFields($fields);
        if (!$valid) {
            return new Response('Required field(s) missing.', 400);
        }

        Member::create($this->request->only($fields));
        return new Response('Member created.', 200);
    }

    public function validateFields($fields)
    {
        foreach($fields as $f) {
            if (!$this->request->has($f)) {
                return false;
            }
        }
        return true;
    }
}