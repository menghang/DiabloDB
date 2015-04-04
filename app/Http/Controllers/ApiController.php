<?php namespace DiabloDB\Http\Controllers;

use \Auth;
use DiabloDB\Character;
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

    public function deleteMember($id)
    {
        try {
            $member = Member::where('id', $id)->firstOrFail();
        } catch (\Exception $e) {
            return response('Bad Request.', 400);
        }

        /* Is Admin? */
        $user = Auth::user();
        if (!$user->isAdmin()) {
            return response('Unauthorized', 401);
        }

        $member->delete();
    }

    public function deleteCharacter($id)
    {
        try {
            $character = Character::where('id', $id)->firstOrFail();
        } catch (\Exception $e) {
            return response('Bad Request.', 400);
        }

        /* Is Admin? or Character Owner */
        $user = Auth::user();

        if ($user->isAdmin() || $user->id == $character->member->id) {
            $character->delete();
        }
    }
}
