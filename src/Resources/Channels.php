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

class Channels extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update'];

    /**
     * Add ChannelID into the scheduler
     *
     * @param int  $teamId
     * @param int  $channelId
     * @param bool $scheduleImport
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function add(int $teamId, int $channelId, bool $scheduleImport = true)
    {
        return $this->request->post('', [
            'teamId' => $teamId,
            'channelId' => $channelId,
            'scheduleImport' => $scheduleImport
        ]);
    }

    /**
     * Get a Channel as provided by SaferMe ID
     *
     * @param int $channelId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get(int $channelId)
    {
        return $this->request->get(':channelId', compact('channelId'));
    }

    /**
     * Get the scheduled tasks, or scheduled tasks by team
     *
     * @param int $teamId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function scheduled(int $teamId = null)
    {
        $data = [];
        if (!is_null($teamId)) {
            $data = [
                'teamId' => $teamId
            ];
        }

        return $this->request->get('scheduled', compact('teamId'));
    }

    /**
     * Get the Channels listed by the TeamId
     *
     * @param int $teamId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function team(int $teamId)
    {
        return $this->request->get('team/:teamId', compact('teamId'));
    }

}
