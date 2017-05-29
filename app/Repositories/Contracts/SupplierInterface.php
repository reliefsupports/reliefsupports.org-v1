<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\Paginator;

interface SupplierInterface
{
    /**
     *  Add a supplier to the system
     *
     */
    public function add();

    /**
     * Return paginated list of suppliers
     *
     * @return Paginator
     */
    public function lists();
}