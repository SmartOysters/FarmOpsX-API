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
     * @param int    $teamId         TeamId
     * @param int    $channelId      ChannelId
     * @param string $channelType    ChannelType value that the value has
     * @param bool   $scheduleImport Should the channel be scheduled for import
     * @param array  $options        Array of data that is saved into the metadata
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function add(int $teamId, int $channelId, $channelType = '', $scheduleImport = true, $options = [])
    {
        return $this->request->post('', [
            'teamId' => $teamId,
            'channelId' => $channelId,
            'channelType' => $channelType,
            'metadata' => json_encode(array_merge([
                'importReports' => $scheduleImport
            ], $options))
        ]);
    }

    /**
     * Get a Channel as provided by SaferMe ID
     *
     * @param int $channelId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get($channelId)
    {
        return $this->request->get(':channelId', compact('channelId'));
    }

    /**
     * Update a channel
     *
     * @param int    $channelId    ChannelID
     * @param string $channelType  ChannelType value that the value has
     * @param array  $metadata     Array of data that is saved into the metadata
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function edit($channelId, $channelType, $metadata)
    {
        return $this->request->put(':channelId', compact('channelId', 'channelType', 'metadata'));
    }

    /**
     * Add channel to import, and set the manner in which
     * the reports are generated
     *
     * @param int   $channelId
     * @param array $reports
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function import($channelId, array $reports = [])
    {
        $defaults = ['notifier' => false, 'scheduled' => false];

        return $this->request->put(':channelId/import', [
            'channelId' => $channelId,
            'reports' => array_merge($defaults, $reports)
        ]);
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
