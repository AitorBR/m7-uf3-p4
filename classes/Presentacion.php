<?php
namespace AutoTest;
use MongoDB\Model\BSONArray;
use MongoDB\BSON\Persistable;
use MongoDB\BSON\ObjectId;
class Presentacion implements Persistable
{
    public $data;
    public $colorTitle;
    public $colorSubtitle;
    public $font;
    public $position;
    public $autoDiapo;
    public $author;
    public $date;
    public $id;

    public function __construct(string $data = "", string $colorTitle = "black", string $colorSubtitle = "black", string $font = "Arial", $position = "center", $autoDiapo = false, $author = "", $date = "")
    {
        $this->id = new ObjectId();
        $this->data = $data;
        $this->colorTitle = $colorTitle;
        $this->colorSubtitle = $colorSubtitle;
        $this->font = $font;
        $this->position = $position;
        $this->autoDiapo = $autoDiapo;
        $this->author = $author;
        $this->date = date('Y-m-d', time());
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * Get the value of colorTitle
     */
    public function getColorTitle()
    {
        return $this->colorTitle;
    }
    /**
     * Set the value of colorTitle
     *
     * @return  self
     */
    public function setColorTitle($colorTitle)
    {
        $this->colorTitle = $colorTitle;
        return $this;
    }
    /**
     * Get the value of font
     */
    public function getFont()
    {
        return $this->font;
    }
    /**
     * Set the value of font
     *
     * @return  self
     */
    public function setFont($font)
    {
        $this->font = $font;
        return $this;
    }
    /**
     * Get the value of position
     */
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * Set the value of position
     *
     * @return  self
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }
    /**
     * Get the value of colorSubtitle
     */
    public function getColorSubtitle()
    {
        return $this->colorSubtitle;
    }
    /**
     * Set the value of colorSubtitle
     *
     * @return  self
     */
    public function setColorSubtitle($colorSubtitle)
    {
        $this->colorSubtitle = $colorSubtitle;
        return $this;
    }
    /**
     * Get the value of autoDiapo
     */
    public function getAutoDiapo()
    {
        return $this->autoDiapo;
    }
    /**
     * Set the value of autoDiapo
     *
     * @return  self
     */
    public function setAutoDiapo($autoDiapo)
    {
        $this->autoDiapo = $autoDiapo;
        return $this;
    }
    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    public function bsonSerialize()
    {
        return [
            '_id'  => $this->id,
            'data' => $this->data,
            'colorTitle' => $this->colorTitle,
            'colorSubtitle' => $this->colorSubtitle,
            'font' => $this->font,
            'position' => $this->position,
            'autoDiapo' => $this->autoDiapo,
            'author' => $this->author,
            'date' => $this->date,
        ];
    }
    public function bsonUnserialize(array $dataArray)
    {
        $this->id = $dataArray['_id'];
        $this->data = $dataArray['data'];
        /*echo 'asdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff';
        var_dump($dataArray['data']);*/
        $this->colorTitle = $dataArray['colorTitle'];
        $this->colorSubtitle = $dataArray['colorSubtitle'];
        $this->font = $dataArray['font'];
        $this->position = $dataArray['position'];
        $this->autoDiapo = $dataArray['autoDiapo'];
        $this->author = $dataArray['author'];
        $this->date = $dataArray['date'];
    }
    public function __toString()
    {
        return "({$this->id},{$this->data}, {$this->colorTitle}, {$this->colorSubtitle}, {$this->font}, {$this->position}, {$this->autoDiapo}, {$this->author},{$this->date})";
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
