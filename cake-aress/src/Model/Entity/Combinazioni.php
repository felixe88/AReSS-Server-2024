<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Combinazioni Entity
 *
 * @property int $id
 * @property int $classe_eta
 * @property string $comuni
 * @property int $anno
 * @property string $sesso
 * @property string $patologia
 */
class Combinazioni extends Entity
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
        'classe_eta' => true,
        'comuni' => true,
        'anno' => true,
        'sesso' => true,
        'patologia' => true,
    ];
}
