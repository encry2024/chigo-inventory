<?php

namespace App\Events\Backend\Inventory\Aircon;

use Illuminate\Queue\SerializesModels;

/**
 * Class AirconUpdated.
 */
class AirconUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $aircon;

    /**
     * @param $aircon
     */
    public function __construct($aircon)
    {
        $this->aircon = $aircon;
    }
}
