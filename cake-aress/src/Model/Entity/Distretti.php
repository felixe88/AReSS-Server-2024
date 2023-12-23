<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Distretti Entity
 *
 * @property int|null $IDDistretto
 * @property string|null $Descrizione
 * @property int|null $IDAsl
 * @property int|null $CapSede
 * @property string|null $ProvinciaSigla
 */
class Distretti extends Entity
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
        'IDDistretto' => true,
        'Descrizione' => true,
        'IDAsl' => true,
        'CapSede' => true,
        'ProvinciaSigla' => true,
    ];
}
