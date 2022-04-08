<?php

require_once __DIR__ . '/class.tag.php';

class course {

    private $Name;
    private $Content;
    private $Image;
    private $Trailer;
    private $StartDate;
    private $EndDate;
    private $Tags = [];

    function __construct(String $Name, String $ImageUrl, $Tags)
    {
        $this->Name   = $Name;
        $this->Image = $ImageUrl;
        foreach ($Tags as $Tag) {
            $this->Tags[] = $Tag;
        }
    }

    public function setName(String $Name)
    {
        $this->Name = $Name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setContent(String $Content)
    {
        $this->Content = $Content;
    }

    public function getContent()
    {
        return $this->Content;
    }

    public function setImage(String $Image)
    {
        $this->Image = $this->imagecreatefromfile($ImageUrl);
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setTrailer(String $Trailer)
    {
        $this->Trailer = $Trailer;
    }

    public function getTrailer()
    {
        return $this->Trailer;
    }

    public function setStartDate(Date $StartDate)
    {
        $this->StartDate = $StartDate;
    }

    public function getStartDate()
    {
        return $this->StartDate;
    }

    public function setEndDate(Date $EndDate)
    {
        $this->EndDate = $EndDate;
    }

    public function getEndDate()
    {
        return $this->EndDate;
    }

    public function setTag(Tag $Tag)
    {
        $this->Tags[] = $Tag;
    }

    public function getTag()
    {
        return $this->Tags;
    }

    private function imagecreatefromfile( $filename ) {

        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                return imagecreatefromjpeg($filename);
            break;

            case 'png':
                return imagecreatefrompng($filename);
            break;

            case 'gif':
                return imagecreatefromgif($filename);
            break;

            default:
                throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
            break;
        }
    }
}

