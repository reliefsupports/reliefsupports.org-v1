<?php

namespace App\Repositories\Contracts;

use App\ItemType;
use Illuminate\Pagination\Paginator;

interface SupplierInterface
{
    /**
     *  Add a supplier to the system
     *
     */
    public function add($attributes);

    /**
     * Return paginated list of suppliers
     *
     * @return Paginator
     */
    public function lists();

    /**
     * Return available item types
     *
     * @return ItemType[]
     */
    public function itemTypes();
}