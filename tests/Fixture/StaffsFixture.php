<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffsFixture
 */
class StaffsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'department_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-01-10 14:59:50',
                'modified' => '2026-01-10 14:59:50',
            ],
        ];
        parent::init();
    }
}
