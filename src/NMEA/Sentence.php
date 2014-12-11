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

    public static function factory($rawSentence)
    {
        $parts = explode(',', $rawSentence);
        if (count($parts) < 5) {
            throw new \InvalidArgumentException(sprintf("The sentence '%s' is not valid.", $rawSentence));
        }

        if ('$' !== substr($parts[0], 0, 1)) {
            throw new \InvalidArgumentException(sprintf("The sentence '%s' data type must start with a \$ sign.", $rawSentence));
        }

        if ('GP' === substr($parts[0], 1, 2)) {
            $key = substr($parts[0], 3);
            if (!isset(DataType::$types[$key])) {
                throw new \InvalidArgumentException(sprintf("The data type '%s' in sentence '%s' is invalid.", $parts[0], $rawSentence));
            }

        } else {
            // proprietary codes
            $key = substr($parts[0], 1);
            if (!isset(DataType::$types[$key])) {
                throw new \InvalidArgumentException(sprintf("The data type '%s' in sentence '%s' is invalid or is not supported.", $parts[0], $rawSentence));
            }
        }

        $sentence = new self($key);
        $sentence->setRawSentence($rawSentence);

        return $sentence;
    }
}