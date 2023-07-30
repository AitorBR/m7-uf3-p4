<?php

namespace AutoTest;

use MongoDB\Model\BSONArray;
use MongoDB\BSON\Persistable;
use MongoDB\BSON\ObjectId;

class DefaultPortada extends Portada
{
    public $subtitol;

    public function __construct(string $titol = "", string $cover = "", string $subtitol = "")
    {
        parent::__construct($titol, $cover);
        $this->subtitol = $subtitol;
    }

    /**
     * Get the value of subtitol
     */
    public function getSubtitol()
    {
        return $this->subtitol;
    }
    /**
     * Set the value of subtitol
     *
     * @return  self
     */
    public function setSubtitol($subtitol)
    {
        $this->subtitol = $subtitol;
        return $this;
    }
    /*public function bsonSerialize()
    {
        $a = [
            'subtitol'  => $this->subtitol,
        ];
        array_push($a, parent::bsonSerialize());
        return $a;
    }*/
    public function bsonSerialize()
    {
        return [
            'subtitol'  => $this->subtitol,
            'titol'  => $this->titol,
            'cover' => $this->cover,
        ];
    }
    public function bsonUnserialize(array $dataArray)
    {
        $this->subtitol = $dataArray['subtitol'];
        parent::bsonUnserialize($dataArray);
    }

    public function __toString()
    {
        return "({$this->subtitol})";
    }
}
