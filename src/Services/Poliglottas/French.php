<?php

namespace ALameLlama\Geographer\Services\Poliglottas;

use ALameLlama\Geographer\Contracts\IdentifiableInterface;

/**
 * Class French
 * @package MenaraSolutions\FluentGeonames\Services\Poliglottas
 */
class French extends Base
{
    /**
     * @var string
     */
    protected $code = 'fr';

   /**
    * @var array
    */
    protected $defaultPrepositions = [
        'from' => 'de',
        'in' => 'à'
    ];
}
