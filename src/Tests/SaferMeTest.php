<?php

/*
 * This file is part of the FarmOpsX API PHP Package
 *
 * (c) James Rickard <james.rickard@smartoysters.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartOysters\FarmOpsX\Tests;

use PHPUnit\Framework\TestCase;
use SmartOysters\FarmOpsX\FarmOpsX;

class FarmOpsXTest extends TestCase
{
    public function testConstructor()
    {
        $farmOpsX = new FarmOpsX();
        $this->assertInstanceOf('SmartOysters\FarmOpsX\FarmOpsX', $farmOpsX);
    }

    public function testAlertAreasResourceObject()
    {
        $farmOpsX = new FarmOpsX();

        $this->assertInstanceOf('SmartOysters\FarmOpsX\Resources\Shapes', $farmOpsX->shapes());
        $this->assertInstanceOf('SmartOysters\FarmOpsX\Resources\Shapes', $farmOpsX->Shapes());
    }

    public function testAlertAreasMagicMethod()
    {
        $farmOpsX = new FarmOpsX();

        $this->assertInstanceOf('SmartOysters\FarmOpsX\Resources\Shapes', $farmOpsX->shapes);
        $this->assertInstanceOf('SmartOysters\FarmOpsX\Resources\Shapes', $farmOpsX->Shapes);
    }
}
