<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntryController extends Controller
{
    // private $need;

    /*
     * EntryController constructor.
     */
    public function __construct()
    {
    }

    /**
     * List all donatiaons
     *
     * @return $this
     */
    public function view()
    {
        return view('/frontend/entry/view');
    }
}
