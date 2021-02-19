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

class Shapes extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update'];

    /**
     * Returns all shapes in the system
     *
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function all()
    {
        return $this->request->get('');
    }

    /**
     * Get a specific Shape
     *
     * @param int $shapeId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get(int $shapeId)
    {
        return $this->request->get(':shapeId', compact('shapeId'));
    }

    /**
     * Add a capacity to a Shape
     *
     * @param int $shapeId
     * @param int $capacity
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function capacity(int $shapeId, int $capacity)
    {
        $data["$shapeId"] = $capacity;

        return $this->request->put('capacity', $data);
    }

    /**
     * Rebuild the items for a shape
     *
     * @param array $shapeData
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function rebuild($shapeData = [])
    {
        return $this->request->post('items/rebuild', compact('shapeData'));
    }
}
