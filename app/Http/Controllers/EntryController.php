<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NeedsRepository;
use App\Repositories\DonationRepository;

class EntryController extends Controller
{
    private $need;
    private $donation;

    /*
     * EntryController constructor.
     */
    public function __construct(
        DonationRepository $donationRepository,
        NeedsRepository $needsRepository
    ) {
        $this->need = $needsRepository;
        $this->donation = $donationRepository;
    }

    /**
     * List all donatiaons
     *
     * @return $this
     */
    public function view($type, $id)
    {
        $entry = [];
        if ($type === 'need') {
            $entry = $this->need->findNeed($id);
        }

        if ($type === 'need') {
            $entry = $this->donation->findDonation($id);
        }

        return view('/frontend/entry/view')
            ->with([
                'data' => [
                    'id' => $id,
                    'type' => $type,
                    'entry' => $entry
                ]
            ]);;
    }
}
