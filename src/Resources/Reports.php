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

class Reports extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update'];

    /**
     * Return a Report
     *
     * @param int $reportId
     * @param string|null $stateId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get(int $reportId, $stateId = null)
    {
        return $this->request->get(':reportId', compact('reportId', 'stateId'));
    }

    /**
     * Get Reports by SaferMe ChannelID
     *
     * @param int $channelId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function channel(int $channelId)
    {
        return $this->request->get('channel/:channelId', compact('channelId'));
    }

    /**
     * Get Reports by SaferMe ChannelID
     *
     * @param string $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function report($id)
    {
        return $this->request->get('entry/:id', compact('id'));
    }

    /**
     * Remove report entry
     *
     * @param string $id
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function delete($id)
    {
        return $this->request->delete('entry/:id', compact('id'));
    }

    /**
     * Get Reports by SaferMe TeamID
     *
     * @param int $teamId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function team($teamId)
    {
        return $this->request->get('team/:teamId', compact('teamId'));
    }

    /**
     * Run the Exporter
     *
     * @param array $teamIds
     * @param string|\DateTime|null $to
     * @param string|\DateTime|null $from
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function export($teamIds = [], $to = null, $from = null)
    {
        if ($to instanceof \DateTime) {
            $to = $to->format('Y-m-d');
        }
        if ($from instanceof \DateTime) {
            $from = $from->format('Y-m-d');
        }

        return $this->request->post('export', compact('teamIds'));
    }

    /**
     * Run the Importer
     *
     * @param $teamId
     * @param array $chanelIds
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function import($teamId, $chanelIds = [])
    {
        return $this->request->post('import', compact('teamId', 'chanelIds'));
    }
}

