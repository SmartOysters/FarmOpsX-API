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

class Sync extends Resource
{
    protected $disabled = ['list', 'create', 'update'];

    /**
     * Post Report Data
     *
     * @param array $data
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function externalReport($data = [])
    {
        return $this->request->post('external/saferme/report', $data);
    }

    /**
     * Force Update a Report
     * Ensures a new EntryId is created for report, if the `updated_at`
     * date has not changed in SaferMe
     *
     * @param int $channelId
     * @param int $reportId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function forceReport($channelId, $reportId)
    {
        return $this->request->post('external/farmopsx/report', ['channel_id' => $channelId, 'report_id' => $reportId]);
    }

    /**
     * Run User Activity for an Entry
     *
     * @param string $entryId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function userActivity($entryId)
    {
        return $this->request->post('external/oceanfarmr/user-activity', ['entry_id' => $entryId]);
    }

    /**
     * Run Harvest User Activity for an Entry
     *
     * @param string $entryId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function harvestUserActivity($entryId)
    {
        return $this->request->post('external/oceanfarmr/harvest-user-activity', ['entry_id' => $entryId]);
    }

    /**
     * Send packet of data into the system to injest content
     *
     * @param string $model
     * @param array  $data
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function ingest($model, $data = [])
    {
        return $this->request->post('ingest', compact('model', 'data'));
    }

    /**
     * Get a list of Webhooks
     *
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function webhooks()
    {
        return $this->request->get('webhooks');
    }

    /**
     * Create a new Webhook Sync
     *
     * @param string $type
     * @param string $endpoint
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function generate($type, $endpoint)
    {
        return $this->request->post('webhooks', compact('type', 'endpoint'));
    }

    /**
     * Return a Webhook Sync
     *
     * @param int $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function fetch($id)
    {
        return $this->request->get('webhooks/:id', compact('id'));
    }

    /**
     * Sync Webhook
     *
     * @param string $id
     * @param string $type
     * @param string $endpoint
     * @param bool   $enabled
     * @param array  $metadata
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function sync($id, $type, $endpoint, $enabled = true, $metadata = [])
    {
        return $this->request->put('webhooks/:id', compact('id', 'type', 'endpoint', 'enabled', 'metadata'));
    }

    /**
     * Remove a Webhook Sync
     *
     * @param $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function delete($id)
    {
        return $this->request->delete('webhooks/:id', compact('id'));
    }
}
