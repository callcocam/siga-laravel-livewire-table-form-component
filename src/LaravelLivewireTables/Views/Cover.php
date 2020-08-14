<?php


namespace Call\LaravelLivewireTables\Views;


class Cover extends Component
{

    public $files = [];
    /**
     * Link constructor.
     *
     * @param array $cover
     */
    public function __construct($cover=[])
    {
        if ($cover) {
            $this->files = $cover;
        }
    }

    /**
     * @param $text
     *
     * @return self
     */
    public static function make($cover=[]): self
    {
        return new static($cover);
    }

    /**
     * @param $text
     *
     * @return self
     */
    public function text($text): self
    {
        return $this->setAttribute('text', $text);
    }

    /**
     * @param $class
     *
     * @return $this
     */
    public function class($class): self
    {
        return $this->setAttribute('class', $class);
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function id($id): self
    {
        return $this->setAttribute('id', $id);
    }

    /**
     * @param $icon
     *
     * @return $this
     */
    public function icon($icon): self
    {
        return $this->setOption('icon', $icon);
    }



    /**
     * @return string
     */
    public function view(): string
    {
        return 'lw-tables::components.cover';
    }
}
