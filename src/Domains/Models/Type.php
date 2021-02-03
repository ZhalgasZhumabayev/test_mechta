<?php

namespace App\Domains\Models;

use Doctrine\ORM\Mapping as ORM;
use Yii;
use yii\db\ActiveRecord;

/**
 * @ORM\Entity()
 * @ORM\Table(name="tld")
 */
class Type extends ActiveRecord
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    public $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $type;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    public $price;
}
