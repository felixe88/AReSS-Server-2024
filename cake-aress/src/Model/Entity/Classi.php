<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Classi Entity
 *
 * @property int|null $IDClasse
 * @property string|null $classe_eta
 * @property int|null $peso_eu
 * @property string|null $Gruppo_Tumori
 * @property string|null $Gruppo_Cronicita
 */
class Classi extends Entity
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
        'IDClasse' => true,
        'classe_eta' => true,
        'peso_eu' => true,
        'Gruppo_Tumori' => true,
        'Gruppo_Cronicita' => true,
    ];
}
