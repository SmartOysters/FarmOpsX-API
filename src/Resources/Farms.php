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

class Farms extends Resource
{
    protected $disabled = ['fetch', 'create', 'update'];

    /**
     * Add Farm data to the API
     *
     * @param array $values
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function add($values = [])
    {
        return $this->request->post('', $values);
    }

    /**
     * Edit Farm information
     *
     * @param int   $farmId
     * @param array $values
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function edit($farmId, $values = [])
    {
        return $this->request->put(':farmId', array_merge([
            'farmId' => $farmId
        ], $values));
    }
}
