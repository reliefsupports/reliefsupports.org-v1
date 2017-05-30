<?php

namespace App\Http\Controllers;

use App\Repositories\DonationRepository;
use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    private $donation;
    private $need;

    /*
     * EntryController constructor.
     */
    public function __construct(DonationRepository $donationRepository, NeedsRepository $needsRepository)
    {
         $this->donation = $donationRepository;
         $this->need = $needsRepository;
    }

    /**
     * List all donatiaons
     *
     * @return $this
     */
    public function view($type, $id)
    {
        if (strcmp($type, "donation")==0){
            $entry =  $this->donation->getDonations();
            return view('/frontend/entry/donation') -> with ('entry', $entry);
        } elseif(strcmp($type, "need")==0){
            $entry =  $this->need->getNeeds();
            return view('/frontend/entry/need') -> with ('entry', $entry);
        }
        return $this->donation->getDonations();
    }
}