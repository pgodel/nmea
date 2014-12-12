<?php

namespace NMEA;

class Sentence
{
    /**
     * @var string
     */
    protected $dataType;

    /**
     * @var string;
     */
    protected $rawSentence;

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

}