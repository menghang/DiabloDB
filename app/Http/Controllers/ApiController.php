<?php namespace DiabloDB\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function storeMember($data)
    {

    }

    public function validateFields($fields)
    {

    }
}