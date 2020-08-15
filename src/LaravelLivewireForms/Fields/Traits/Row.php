<?php


namespace Call\LaravelLivewireForms\Fields\Traits;


trait Row
{


    public function openTag($tag="div")
    {
        $this->type = 'open-tag';
        $this->class = 'row';
        $this->tag = $tag;
        return $this;
    }

    public function closeTag($tag="div")
    {
        $this->type = 'close-tag';
        $this->tag = $tag;
        return $this;
    }

    public function isTag(){

        return $this->type === 'tag';
    }
}
