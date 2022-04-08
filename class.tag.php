<?php
class Tag {

    private $Name;
    private $InternalOrExternal;

    function __construct(String $Name, bool $InternalOrExternal)
    {
        $this->Name   = $Name;
        $this->InternalOrExternal =  $InternalOrExternal;
    }

    public function setName(String $Name)
    {
        $this->Name = $Name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setInternalOrExternal(bool $InternalOrExternal)
    {
        $this->InternalOrExternal = $InternalOrExternal;
    }

    public function getInternalOrExternal()
    {
        return $this->InternalOrExternal;
    }

}