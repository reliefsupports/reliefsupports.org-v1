<?php

namespace App\Http\Controllers;

use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;
use App\Services\FacebookNotification;
use DomainException;

class NeedsController extends Controller
{
    private $need;

    private $fbNotifier;

    /**
     * NeedsController constructor.
     * @param NeedsRepository $needsRepository
     * @param FacebookNotification $fbNotifier
     */
    public function __construct(NeedsRepository $needsRepository, FacebookNotification $fbNotifier)
    {
        $this->need = $needsRepository;
        $this->fbNotifier = $fbNotifier;
    }

    /**
     * List all donatiaons
     *
     * @return $this
     */
    public function index()
    {
        $needs = $this->need->getNeeds();
        return view('/frontend/needs/index')->with(['needs' => ($needs) ? $needs : array()]);
    }

    /**
     * Add needs
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('/frontend/needs/add');
    }

    /**
     * Save need
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'telephone' => 'required|max:100',
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            'needs' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/needs/add')
                ->with('isSuccess', false)
                ->with('errors', $validator->errors()->all())
                ->withInput();
        } else {
            try {

                $need = $this->need->addNeed($request->all());

                //need is being created first and if fb posting fail rest of the logic
                //is executed
                $fbId = $this->fbNotifier->publishNeed($need);
                $this->need->updateNeed($need->id, ['fb_post_id' => $fbId]);

                return redirect('/needs')
                    ->with('isSuccess', true)
                    ->with('message', 'Needs added.');
            } catch (DomainException $e) {
                return redirect('/needs/add')
                    ->with('isSuccess', false)
                    ->with('errors', ['Needs adding failed. Please try again.'])
                    ->withInput();
            }
        }
    }

    /**
     * Show need
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $need = $this->need->findNeed($id);

        if ($need) {
            return Response::json([
                'isSuccess' => true,
                'need' => $need,
            ]);
        } else {
            return Response::json([
                'isSuccess' => false
            ]);
        }
    }

    public function get($id = null) {
        $response = array(
            'error' => true,
            'data' => null
        );
        $needs = $this->need->getNeeds();
        if (!$needs) {
            $needs = [];
        }
        $response['data'] = $needs;
        $response['error'] = false;

        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public function post(Request $request) {
        $response = array(
            'error' => true,
            'data' => null
        );
        if ( $this->need->addNeed($request->all()) ) {
            $response['error'] = false;
        }

        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}

