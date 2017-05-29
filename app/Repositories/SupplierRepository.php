<?php

namespace App\Repositories;


use App\ItemType;
use App\Repositories\Contracts\SupplierInterface;
use App\Supplier;

class SupplierRepository implements SupplierInterface
{

    /**
     * @inheritdoc
     */
    public function add($attributes)
    {
        return Supplier::create($attributes);
    }

    /**
     * @inheritdoc
     */
    public function lists()
    {
        return Supplier::with('type')
            ->paginate();
    }

    /**
     * @inheritdoc
     */
    public function itemTypes()
    {
        return ItemType::all();
    }
}