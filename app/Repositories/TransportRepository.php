<?php
/**
 * Created by IntelliJ IDEA.
 * User: shashika
 * Date: 5/29/17
 * Time: 3:06 PM
 */
namespace App\Repositories;

use App\Repositories\Contracts\TransportInterface;
use App\Transport;
use Illuminate\Support\Facades\Log;

class TransportRepository implements TransportInterface
{
    /**
     * Add needs
     *
     * @param $input
     * @return bool
     */
    public function addTransport($input)
    {
        try {
            Transport::create($input);
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
    public function getTransports($limit = null)
    {
        try {
            if ($limit) {
                return Transport::orderBy('id', 'desc')->take($limit)->get();
            }
            return Transport::orderBy('id', 'desc')->paginate(10);
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
    public function findTransport($id)
    {
        try {
            return Transport::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}