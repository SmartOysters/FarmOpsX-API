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

class Features extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update', 'delete'];

    /**
     * Mark the Shape as deleted
     *
     * @param int $featureId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function markDeleted($featureId)
    {
        return $this->request->delete(':featureId', compact('featureId'));
    }

    /**
     * Create the Features for a dataset
     *
     * @param int $featureId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function rebuild($data = [])
    {
        return $this->request->post('rebuild', $data);
    }
}
