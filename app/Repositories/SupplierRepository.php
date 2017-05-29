<?php

namespace App\Repositories;


use App\Repositories\Contracts\SupplierInterface;
use App\Supplier;

class SupplierRepository implements SupplierInterface
{

    /**
     * @inheritdoc
     */
    public function add()
    {

    }

    /**
     * @inheritdoc
     */
    public function lists()
    {
        return Supplier::with('type')
            ->paginate();
    }
}