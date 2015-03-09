<?php namespace DiabloDB\Http\Controllers;

use DiabloDB\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ApiController
 * @package DiabloDB\Http\Controllers
 */
class ApiController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Store a Member in the database.
     * @return Response
     */
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

    /**
     * Validates the request contains required fields.
     * @param string|array $fields Array of field(s).
     * @return boolean
     */
    public function validateFields($fields)
    {
        foreach ($fields as $f) {
            if (!$this->request->has($f)) {
                return false;
            }
        }
        return true;
    }
}
