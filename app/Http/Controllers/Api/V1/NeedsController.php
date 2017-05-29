<?php

namespace App\Http\Controllers\Api\V1;

use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;

class  NeedsController extends ApiController {


    private $needs;

    public function __construct(NeedsRepository $needs)
    {
        $this->needs = $needs;
    }


    /**
     * Get All request with a default limit, or send additional requests limit and query as q
     *
     * @param Request $request
     * @param null $limit
     * @return mixed
     */
    public function index(Request $request, $limit = null)
    {
        if ($request->has('limit')) {
            $limit = $request->get('limit');
        }

        $data = $this->needs;

        $data = $data->getNeeds($limit);

        return $this->respond($data);
    }


    /**
     * Get Need by ID
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function show(Request $request, $id)
    {
        $data = $this->needs->findNeed($id);

        return $this->respond($data);
    }


    /**
     * Create via Needs via API
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'needs' => 'required',
            'heads' => 'required',
        ]);

        $data = $this->needs->addNeed($request->all());

        return $this->respondCreated($data);

    }

}