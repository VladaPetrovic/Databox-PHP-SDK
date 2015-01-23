<?php
namespace Databox\Widget;

use \Databox\KPI as KPI;

class Pie extends Base
{

    /**
     * Pie labels
     * @var array
     */
    protected $labels = [];

    /**
     * Pie values
     * @var array
     */
    protected $values = [];

    /**
     * Pie changes
     * @var array
     */
    protected $changes = [];

    /**
     * Pie formats
     * @var array
     */
    protected $formats = [];

    /**
     * Append to the key
     *
     * @var string
     */
    private $suffix = '';

    /**
     * Add a Pie/Funnel/Pipeline slice.
     * @param string $label  The label of the slice.
     * @param string|int|float $value  The value of the slice.
     * @param string $change The change property of the value. Optional.
     */
    public function addSlice($label, $value, $change = '', $formats = '')
    {
        $this->labels[]  = $label;
        $this->values[]  = $value;
        $this->changes[] = $change;
        $this->formats[] = $formats;
    }

    /**
     * Returns KPI response array
     */
    public function getData()
    {
        $date     = $this->date ? $this->date : null;
        $response = [
            new KPI($this->key . '@labels'  . $this->suffix, $this->labels, $date),
            new KPI($this->key . "@values"  . $this->suffix, $this->values, $date),
            new KPI($this->key . "@changes" . $this->suffix, $this->changes, $date),
            new KPI($this->key . "@formats" . $this->suffix, $this->formats, $date)
        ];

        return $response;
    }

    /**
     * Set suffix
     *
     * @param  string $value String to append to key
     * @return null
     */
    public function setSuffix($value)
    {
        $this->suffix = $value;
    }
}
