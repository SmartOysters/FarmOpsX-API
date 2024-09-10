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

use ReflectionClass;
use SmartOysters\FarmOpsX\Resources\Base\Resource;
use SmartOysters\FarmOpsX\Response;

class ViewReportsHarvestReports extends Resource
{
    protected $disabled = ['list', 'fetch', 'create', 'update'];

    /**
     * Update a Harvest Report
     *
     * @param string $harvestGradingEntryId       Harvest Grading Entry ID to be updated
     * @param array  $harvestReportIds            Array of Harvest Report IDs
     * @return \SmartOysters\FarmOpsX\Http\Response
     */
    public function updateReport(string $harvestGradingEntryId, array $harvestReportIds)
    {
        $options = array_merge(compact('harvestGradingEntryId'), [
            'harvest_report_ids' => $harvestReportIds
        ]);

        return $this->request->post(':harvestGradingEntryId/update', $options);
    }

    /**
     * Get the endpoint name based on the name class.
     *
     * @return string
     */
    public function getName()
    {
        $reflection = new ReflectionClass($this);

        return $reflection->getShortName();
    }
}
