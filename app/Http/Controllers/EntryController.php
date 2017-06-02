<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NeedsRepository;
use App\Repositories\DonationRepository;

use Illuminate\Support\Facades\Response;


use App\Http\Controllers\NeedsController;
use App\Http\Controllers\DonationController;


use Illuminate\Support\Facades\View;

class EntryController extends Controller
{
    private $need;
    private $donation;

    private $n;
    private $d;

    /*
     * EntryController constructor.
     */
    public function __construct(
        DonationRepository $donationRepository,
        NeedsRepository $needsRepository,
        NeedsController $needsController,
        DonationController $donationController
    ) {
        $this->need = $needsRepository;
        $this->donation = $donationRepository;
        $this->d = $donationController;
        $this->n = $needsController;

        // TODO: move to a view composer next time someone needs to use APP_URL
        View::share('base_url', env('APP_URL'));
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
            $entry = $this->n->getById($id);
        }

        if ($type === 'donation') {
            $entry = $this->d->getById($id);
        }

        return view('/frontend/entry/view')
            ->with([
                'data' => [
                    'id' => $id,
                    'type' => $type,
                    'entry' => $entry,
                ]
            ]);
    }
}
