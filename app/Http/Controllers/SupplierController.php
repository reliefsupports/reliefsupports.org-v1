<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\SupplierInterface;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * @var SupplierInterface
     */
    private $supplier;

    public function __construct(SupplierInterface $supplier)
    {
        $this->supplier = $supplier;
    }

    public function index()
    {
        $suppliers = $this->supplier->lists();

        return view('frontend.suppliers.index')
            ->with(compact('suppliers'));
    }

}
