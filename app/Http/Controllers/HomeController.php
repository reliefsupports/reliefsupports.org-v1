<?php

namespace App\Http\Controllers;

use App\Repositories\DonationRepository;
use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

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
        $this->need     = $needsRepository;
    }

    /**
     * Home page
     * @return $this
     */
    public function index(Request $request)
    {
        $donations    = $this->donation->getDonations(5);
        $needs        = $this->need->getNeeds(5);
        $hideGreeting = false;

        if ($request->hideGreeting || $request->cookie('hideGreeting')) {
            $hideGreeting=true;
        }


        $view = view('frontend/home')
            ->with([
                'donations' => ($donations) ? $donations : array(),
                'needs' => ($needs) ? $needs : array(),
                'greeting' => $hideGreeting
            ]);

        if ($hideGreeting) {
            $hideGreetingCookie = cookie('hideGreeting', 'my value',60*24);
            return response($view)->withCookie($hideGreetingCookie);
        } else {
            return $view;
        }

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
