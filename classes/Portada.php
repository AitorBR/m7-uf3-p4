<?php

namespace AutoTest;

use MongoDB\Model\BSONArray;
use MongoDB\BSON\Persistable;
use MongoDB\BSON\ObjectId;
//>= Títol 1
//== Subtítol
//[cover]
//>>>


class Portada implements Persistable
{
    public $titol;
    public $cover;

    public function __construct(string $titol = "", string $cover = "")
    {
        $this->titol = $titol;
        $this->cover = $cover;
    }

    public function getTitol()
    {
        return $this->titol;
    }
    public function setTitol($titol)
    {
        $this->titol = $titol;
        return $this;
    }
    public function getCover()
    {
        return $this->cover;
    }
    public function setCover($cover)
    {
        $this->cover = $cover;
        return $this;
    }

    public function bsonSerialize()
    {
        return [
            'titol'  => $this->titol,
            'cover' => $this->cover,
        ];
    }
    public function bsonUnserialize(array $dataArray)
    {
        $this->titol = $dataArray['titol'];
        $this->cover = $dataArray['cover'];
    }
    public function __toString()
    {
        return "({$this->titol},{$this->cover}, {$this->autor})";
    }
}
