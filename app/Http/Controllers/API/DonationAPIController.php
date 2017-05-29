<?php

namespace App\Http\Controllers\API;

use App\Repositories\DonationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Validator;

class DonationAPIController extends Controller
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
     * return list of all donatiaons
     *
     * @return $this
     */
    public function index(Request $request)
    {
        $donations = $this->donation->getDonations();
        return response(array(
                'error' => false,
                'message' => null,
                'data' => $donations
            ),200); 
    }

    /**
     * Save donation
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
            'donation' => 'required',
        ]);
        
        if ($validator->fails()) {
            // 
            return response(array(
                    'error' => true,
                    'message' => 'Validation error.',
                    'data' => $validator->errors()->all()
                ),200); 

        } else { 
            $response = $this->donation->addDonation($request->all());
            // 
            if ($response) {
                return response(array(
                        'error' => false,
                        'message' => 'Donation added.',
                        'data' => null
                    ),200); 
            } else {
                return response(array(
                        'error' => true,
                        'message' => 'Donation adding failed. Please try again.',
                        'data' => null
                    ),200); 
            }
        }
    }

    /**
     * return a donation
     *
     * @param $id
     * @return JSON
     */    
    public function show($id)
    {
        $donation = $this->donation->findDonation($id);

        if ($donation) {
            return response(array(
                'error' => false,
                'message' => null,
                'data' => $donation
            ),200); 
        } else {
            return response(array(
                'error' => true,
                'message' => 'Donation not found.',
                'data' => null
            ),200); 
        }
    }
}