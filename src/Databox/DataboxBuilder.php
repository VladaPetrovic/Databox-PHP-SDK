<?php

namespace Databox;

use \DateTime;
use \DateTimeZone;

class DataboxBuilder
{
    /**
     * Class for building JSON request for Databox
     */
    protected $JSON;

    public function __construct()
    {
        $this->JSON = [];
    }

    public function addKpi($key, $value, $date = null)
    {
        if (is_null($date)) {
            $UTC = new DateTimeZone("UTC");
            $date = new DateTime("now", $UTC);
            $date = $date->format('Y-m-d\TH:i:s');
        }
        $this->JSON['data'][] = ["key" => $key, "value" => $value, "date" => $date];
    }

    public function getPayload()
    {
        $payload = json_encode($this->JSON);

        return $payload;
    }

    public function reset()
    {
        $this->JSON = [];
    }
}
