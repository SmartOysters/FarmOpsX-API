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

class Tasks extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update'];

    /**
     * Returns all tasks in the system
     *
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function all($status = null, $name = null)
    {
        return $this->request->get('', compact('status', 'name'));
    }

    /**
     * Get a specific task
     *
     * @param int $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get(string $id)
    {
        return $this->request->get(':id', compact('id'));
    }

    /**
     * Cancel a task, only when pending
     *
     * @param string $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function cancel(string $id)
    {
        return $this->request->put(':id/cancel', compact('id'));
    }

    /**
     * Restart a Task
     *
     * @param string $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function restart(string $id)
    {
        return $this->request->put(':id/restart', compact('id'));
    }

    /**
     * Push a Task into the queue
     *
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function push(string $name, ?array $parameters)
    {
        $options = array_merge(compact('name'), compact('parameters'));

        return $this->request->post('/push', $options);
    }
}
