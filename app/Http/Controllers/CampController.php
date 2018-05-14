<?php

namespace App\Http\Controllers;

use App\Repositories\CampRepository;
use Illuminate\Http\Request;
use Validator;

class CampController extends Controller
{
    private $camp;

    /**
     * CampController constructor.
     * @param CampRepository $campRepository
     */
    public function __construct(CampRepository $campRepository)
    {
        $this->camp = $campRepository;
    }

    /**
     * Save camp
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {

        $messages = [
            'region.required' => 'ග්‍රාම නිළධාරි වසම ඇතුලත් කිරීම අනිවාර්යයි',
            'location.required' => 'කදවුරු පිහිටි ස්ථානය ඇතුලත් කිරීම අනිවාර්යයි',
            'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
        ];

        $validator = Validator::make($request->all(), [
            'region' => 'required|max:100',
            'location' => 'required|max:100'
        ], $messages);

        if ($validator->fails()) {
            return redirect('/camps/add')
                ->with('isSuccess', false)
                ->with('errors', $validator->errors()->all())
                ->withInput();
        } else {
            $response = $this->camp->addCamp($request->all());
            if ($response) {
                return redirect('/camps')
                    ->with('isSuccess', true)
                    ->with('message', 'සාර්ථකව ඇතුලත්කරන ලදී.');
            } else {
                return redirect('/camps/add')
                    ->with('isSuccess', false)
                    ->with('errors', ['ඇතුලත්කිරීම දෝෂ සහිතය.'])
                    ->withInput();
            }
        }
    }

    /**
     * List all camps
     *
     * @return $this
     */
    public function index()
    {
        $camps = $this->camp->getCamps();

        return view('/frontend/camps/index')->with(
            ['camps' => ($camps) ? $camps : array()]
        );
    }

    /**
     * Add camp
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('/frontend/camps/add');
    }

    /**
     * Show camp
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $camp = $this->camp->findCamp($id);

        if ($camp) {
            return Response::json([
                'isSuccess' => true,
                'donation' => $camp,
            ]);
        } else {
            return Response::json([
                'isSuccess' => false
            ]);
        }
    }
}
