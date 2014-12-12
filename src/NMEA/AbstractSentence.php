<?php

namespace NMEA;

abstract class AbstractSentence
{
    /**
     * @var string
     */
    protected $dataType;

    /**
     * @var string;
     */
    protected $rawSentence;

    /**
     * @var array
     */
    protected $values = array();

    function __construct($dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @return string
     */
    public function getRawSentence()
    {
        return $this->rawSentence;
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        $this->rawSentence = $rawSentence;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param array $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function setValue($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getValue($key)
    {
        return isset($this->values[$key]) ? $this->values[$key] : null;
    }

    /**
     * @return bool
     */
    public function validateChecksum()
    {
        if (null === $checksum = $this->getValue('checksum')) {
            return false;
        }
        $value = $this->calculateChecksum(substr($this->rawSentence, 1, -(1+strlen($checksum))));
        return $value == $checksum;
    }

    /**
     * @param $str
     * @return string
     */
    public function calculateChecksum($str)
    {
        $chk = 0;
        for($k = 0; $k < strlen($str); $k++)
        {
            $o = ord(substr($str,$k,1));
            $chk = $chk ^ $o;
        }
        $res = substr("0" . dechex($chk),-2);
        return $res;
    }

    /**
     * @return bool
     */
    public function hasChecksum()
    {
        return null !== $this->getValue('checksum');
    }

    protected function splitChecksum($str)
    {
        return explode('*', $str);
    }

}