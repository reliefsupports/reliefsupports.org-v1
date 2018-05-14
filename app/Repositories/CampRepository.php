<?php
namespace App\Repositories;


use App\Camp;
use App\Repositories\Contracts\CampInterface;
use Illuminate\Support\Facades\Log;

class CampRepository implements CampInterface
{
    /**
     * Add camp
     *
     * @param $input
     * @return mixed
     */
    public function addCamp($input)
    {
        try {
            Camp::create($input);
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Get all camps
     *
     * @param $limit
     * @return mixed
     */
    public function getCamps($limit = null)
    {
        try {
            if ($limit) {
                return Camp::orderBy('id', 'desc')->take($limit)->get();
            }
            return Camp::orderBy('id', 'desc')->paginate(10);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Find camp
     *
     * @param $id
     * @return mixed
     */
    public function findCamp($id)
    {
        try {
            return Camp::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}