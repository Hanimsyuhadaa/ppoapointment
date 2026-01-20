<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartmentsFixture
 */
class DepartmentsFixture extends TestFixture
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
                'post' => 'Lorem ipsum dolor sit amet',
                'campus' => 'Lorem ipsum dolor sit amet',
                'street_1' => 'Lorem ipsum dolor sit amet',
                'street_2' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-01-10 15:01:19',
                'modified' => '2026-01-10 15:01:19',
            ],
        ];
        parent::init();
    }
}
