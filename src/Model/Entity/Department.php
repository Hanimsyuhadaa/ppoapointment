<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property string $name
 * @property string $post
 * @property string $campus
 * @property string $street_1
 * @property string $street_2
 * @property string $postcode
 * @property string $city
 * @property string $state
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Appoinment $appoinment
 * @property \App\Model\Entity\Staff $staff
 */
class Department extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'post' => true,
        'campus' => true,
        'street_1' => true,
        'street_2' => true,
        'postcode' => true,
        'city' => true,
        'state' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'appoinment' => true,
        'staff' => true,
    ];
}
