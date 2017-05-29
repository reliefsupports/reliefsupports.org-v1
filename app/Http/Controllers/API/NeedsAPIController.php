<?php

namespace App\Http\Controllers\API;

use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Validator;

class NeedsAPIController extends Controller
{
    private $need;

    /**
     * NeedsController constructor.
     * @param NeedsRepository $needsRepository
     */
    public function __construct(NeedsRepository $needsRepository)
    {
        $this->need = $needsRepository;
    }

    /**
     * return list of all needs
     *
     * @return JSON
     */
    public function index(Request $request)
    {
        $needs = $this->need->getNeeds();
        return response(array(
                'error' => false,
                'message' => null,
                'data' => $needs
            ),200);     
    }

    /**
     * save need
     *
     * @param Request $request
     * @return JSON
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
            $response = $this->need->addNeed($request->all());
            if ($response) {
                return redirect('/needs')
                    ->with('isSuccess', true)
                    ->with('message', 'Needs added.');
            } else {
                return redirect('/needs/add')
                    ->with('isSuccess', false)
                    ->with('errors', ['Needs adding failed. Please try again.'])
                    ->withInput();
            }
        }
    }

    /**
     * return a need
     *
     * @param $id
     * @return JSON
     */
    public function show($id)
    {
        $need = $this->need->findNeed($id);

        if ($need) {
            return response(array(
                'error' => false,
                'message' => null,
                'data' => $need
            ),200); 
        } else {
            return response(array(
                'error' => true,
                'message' => 'Need not found.',
                'data' => null
            ),200); 
        }
    }

}
