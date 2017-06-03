<?php
/**
 * Created by PhpStorm.
 * User: isuru
 * Date: 5/27/17
 * Time: 2:31 PM
 */

namespace App\Repositories;

use App\Need;
use App\Repositories\Contracts\NeedsInterface;
use Illuminate\Support\Facades\Log;

class NeedsRepository implements NeedsInterface
{
    const NEED_ID_PREFIX = "R";

    /**
     * Add needs
     *
     * @param $input
     * @return bool
     */
    public function addNeed($input)
    {
        try {

            $need = Need::create($input);

            //Update Reference column
            $need->ref =  self::NEED_ID_PREFIX.$need->id;
            $need->save();

            return true;

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Get all donations
     *
     * @param $limit
     * @return bool
     */
    public function getNeeds($limit = null)
    {
        try {
            if ($limit) {
                return Need::orderBy('id', 'desc')->take($limit)->get();
            }
            return Need::orderBy('id', 'desc')->paginate(10);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Find donation
     *
     * @param $id
     * @return bool
     */
    public function findNeed($id)
    {
        try {
            return Need::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}