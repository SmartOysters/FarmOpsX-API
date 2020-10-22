<?php

/*
 * This file is part of the FarmOpsX API PHP Package
 *
 * (c) James Rickard <james.rickard@smartoysters.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartOysters\FarmOpsX\Resources;

use SmartOysters\FarmOpsX\Resources\Base\Resource;
use SmartOysters\FarmOpsX\Response;

class Leases extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update'];

    /**
     * Returns all leases in the system
     *
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function all()
    {
        return $this->request->get('');
    }

    /**
     * Get a specific Lease
     *
     * @param int $leaseId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get(int $leaseId)
    {
        return $this->request->get(':leaseId', compact('leaseId'));
    }

    /**
     * Add a capacity to a Lease
     *
     * @param int $leaseId
     * @param int $capacity
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function capacity(int $leaseId, int $capacity)
    {
        $data["$leaseId"] = $capacity;

        return $this->request->put('capacity', $data);
    }
}
