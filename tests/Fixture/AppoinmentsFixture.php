<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppoinmentsFixture
 */
class AppoinmentsFixture extends TestFixture
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
                'staff_id' => 1,
                'department_id' => 1,
                'start_date' => '2026-01-10',
                'end_date' => '2026-01-10',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-01-10 15:11:06',
                'modified' => '2026-01-10 15:11:06',
            ],
        ];
        parent::init();
    }
}
