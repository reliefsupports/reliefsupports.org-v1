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
                ),400); 

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
                    ),400); 
            }
        }
    }

    /**
     * Update donation
     *
     * @param $id
     * @param Request $request
     * @return JSON
     */ 
    public function update($id, Request $request)
    {
        $donation = $this->donation->findDonation($id);

        if( !$donation )
            return response(array(
                    'error' => true,
                    'message' => 'Donation not found.',
                    'data' => null
                ),400); 

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|max:100',
            'telephone' => 'sometimes|required|max:100',
            'address' => 'sometimes|required|max:100',
            'city' => 'sometimes|required|max:50',
            'donation' => 'sometimes|required',
        ]);

        if ( $validator->fails() ) 
            return response(array(
                    'error' => true,
                    'message' => 'validation error',
                    'data' => $validator->errors()
                ),200);
        
        $response = $this->donation->updateDonation($id, $request->all());
        if ( $response ) 
            return Response::json([
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'Donation successfully updated',
                    'data' => $response
                ], 200);

        return response(array(
                'error' => true,
                'message' => 'Donation update failed. Please try again.',
                'data' => null
            ),400); 
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
