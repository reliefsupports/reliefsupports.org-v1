<?php

namespace App\Http\Controllers;

use App\Repositories\DonationRepository;
use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;

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
                'donations' => $donations,
                'needs' => $needs
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
}
