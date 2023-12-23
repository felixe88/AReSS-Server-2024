<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TumoriFegatoCasi Entity
 *
 * @property int|null $IDComunePop
 * @property int|null $IDPatologia
 * @property int|null $casi
 */
class TumoriFegatoCasi extends Entity
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
    protected $_accessible = [
        'IDComunePop' => true,
        'IDPatologia' => true,
        'casi' => true,
    ];
}
