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

use SmartOysters\FarmOpsX\Exception\FarmOpsXException;
use SmartOysters\FarmOpsX\Resources\Base\Resource;
use SmartOysters\FarmOpsX\Response;

class Photos extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update', 'delete'];

    /**
     * Import photos from Report
     *
     * @param string $reportId
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function report(string $report_id)
    {
        return $this->request->post('report', compact('report_id'));
    }

    /**
     * Get Photos by SaferMe ReportUuid
     *
     * @param string $reportUuid
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function get(string $reportUuid)
    {
        return $this->request->get(':reportUuid', compact('reportUuid'));
    }
}
