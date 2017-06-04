<?php

namespace App\Http\Controllers;

use App\Repositories\DonationRepository;
use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $donation;
    private $need;

    /**
     * HomeController constructor.
     * @param DonationRepository $donationRepository
     * @param NeedsRepository $needsRepository
     */
    public function __construct(DonationRepository $donationRepository, NeedsRepository $needsRepository)
    {
        $this->donation = $donationRepository;
        $this->need = $needsRepository;
    }

    /**
     * Home page
     * @return $this
     */
    public function index()
    {
        $donations = $this->donation->getDonations(5);
        $needs = $this->need->getNeeds(5);

        return view('frontend/home')
            ->with([
                'donations' => ($donations) ? $donations : array(),
                'needs' => ($needs) ? $needs : array()
            ]);
    }

    /**
     * Emergency contacts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function emergency()
    {
        return view('frontend/emergency');
    }
    
    /**
     * Search Donation or/and Needs
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchDonationsOrNeeds(){
         DB::enableQueryLog();
        $search = Input::get('search');
        $searchFor = Input::get('type');
        $donations = array();
        $needs = array();
       
        if($searchFor == "all" || $searchFor =='donations'){
            $donations = $this->donation->searchDonations($search);
        }
        if($searchFor == "all" || $searchFor == "needs"){
            $needs = $this->need->searchNeeds($search);
        }
        
        Input::flash();
        return view('frontend/home')
            ->with([
                'donations' => ($donations) ? $donations : array(),
                'needs' => ($needs) ? $needs : array()
            ]);
        
    }
}
