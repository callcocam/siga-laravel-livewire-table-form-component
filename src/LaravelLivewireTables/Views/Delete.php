<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Views;


class Delete extends Component
{


    public $classDelete = 'btn btn-danger btn-sm';
    public $classDeleteConfirm = 'btn btn-warning btn-sm';

    /**
     * Component constructor.
     *
     * @param bool $text
     * @param bool $confirm
     */
    public function __construct($text = false, $confirm=false)
    {
        if ($text) {
            $this->options['text'] = $text;
        }

        if ($text) {
            $this->options['confirm'] = $confirm;
        }
    }

    /**
     * @param $text
     *
     * @return Button
     */
    public static function make($text,$confirm): self
    {
        return new static($text,$confirm);
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
     * @param $confirm
     * @return self
     */
    public function confirm($confirm): self
    {
        return $this->setAttribute('confirm', $confirm);
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
        return table_views('components.button-delete');
    }
}
