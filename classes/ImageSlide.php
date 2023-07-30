<?php

namespace AutoTest;

use MongoDB\Model\BSONArray;
use MongoDB\BSON\Persistable;
use MongoDB\BSON\ObjectId;

class ImageSlide extends Portada
{
    public $image;

    public function __construct(string $titol = "", string $cover = "", $image = "")
    {
        parent::__construct($titol, $cover);
        $this->image = $image;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
    public function bsonSerialize()
    {
        return [
            'image'  => $this->image,
            'titol'  => $this->titol,
            'cover' => $this->cover,
        ];
    }
    public function bsonUnserialize(array $dataArray)
    {
        $this->image = $dataArray['image'];
        parent::bsonUnserialize($dataArray);
    }
    public function __toString()
    {
        return "({$this->image})";
    }
}
