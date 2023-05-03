<?php

namespace Model;

class Comments
{
    public function __construct(
        private ?int $id = null,
        private ?string $name = null,
        private ?string $comment = null
    ) {
    }

    function getId()
    {
        return $this->id;
    }
    function setId(?int $id)
    {
        $this->id = $id;
    }
    function getName()
    {
        return $this->name;
    }
    function setName(?string $name)
    {
        $this->name = $name;
    }
    function getComment()
    {
        return $this->comment;
    }
    function setComment(?string $comment)
    {
        $this->comment = $comment;
    }
}