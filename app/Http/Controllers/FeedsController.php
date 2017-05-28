<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response; 

class FeedsController extends Controller
{ 

    /*
     * NeedsController constructor.
     */
    public function __construct()
    {
    }

    /**
     * List all donatiaons
     *
     * @return $this
     */
    public function index()
    {
        return view('/frontend/feeds/twitter');
    }
}
