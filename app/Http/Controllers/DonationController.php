<?php

namespace App\Http\Controllers;

use App\Repositories\DonationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class DonationController extends Controller
{
    private $donation;

    /**
     * DonationController constructor.
     * @param DonationRepository $donationRepository
     */
    public function __construct(DonationRepository $donationRepository)
    {
        $this->donation = $donationRepository;
    }

    /**
     * List all donatiaons
     *
     * @return $this
     */
    public function index()
    {
        $donations = $this->donation->getDonations();

        return view('/frontend/donations/index')->with(
            ['donations' => ($donations) ? $donations : array()]
        );
    }

    /**
     * Add donation
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('/frontend/donations/add');
    }

    /**
     * Save donation
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $messages = [
            'name.required' => 'නම ඇතුලත් කිරීම අනිවාර්යයි',
            'telephone.required' => 'දුරකථන අංක ඇතුලත් කිරීම අනිවාර්යයි',
            'address.required' => 'ලිපිනය ඇතුලත් කිරීම අනිවාර්යයි',
            'city.required' => 'නගරය/ප්‍රා.ලේ කොට්ටාසය ඇතුලත් කිරීම අනිවාර්යයි',
            'needs.required' => 'අවශ්‍යතා ඇතුලත් කිරීම අනිවාර්යයි',
            'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'telephone' => 'required|max:100',
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            'donation' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ], $messages);
        
        if ($validator->fails()) {
            return redirect('/donations/add')
                ->with('isSuccess', false)
                ->with('errors', $validator->errors()->all())
                ->withInput();
        } else {
            $response = $this->donation->addDonation($request->all());
            
            if ($response) {
                return redirect('/donations')
                    ->with('isSuccess', true)
                    ->with('message', 'සාර්ථකව ඇතුලත්කරන ලදී.');
            } else {
                return redirect('/donations/add')
                    ->with('isSuccess', false)
                    ->with('errors', ['ඇතුලත්කිරීම දෝෂ සහිතය.'])
                    ->withInput();
            }
        }
    }

    /**
     * Show donation
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $donation = $this->donation->findDonation($id);

        if ($donation) {
            return Response::json([
                'isSuccess' => true,
                'donation' => $donation,
            ]);
        } else {
            return Response::json([
                'isSuccess' => false
            ]);
        }
    }

    /**
     * Show online donations
     *
     * @return page
     */
    public function showOnlineDonations()
    {
        return view('/frontend/donations/onlineDonation');
    }
  
  
    public function get($id = null) {
        $response = array(
            'error' => true,
            'data' => null
        );
        $donations = $this->donation->getDonations();
        if (!$donations) {
            $donations = [];
        }
        $response['data'] = $donations;
        $response['error'] = false;

        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public function post(Request $request) {
        $response = array(
            'error' => true,
            'data' => null
        );
        // [TODO]
        // Add proper auth.
        $src = $request->input('source');
        if ($src === 'fbbot') {
            if ( $this->need->addNeed($request->all()) ) {
                $response['error'] = false;
            }            
        } else {
            $response['error'] = true;
        }
        // $request->request->add(['source' => 'api']);
        
        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}
