<?php


namespace Call\LaravelLivewireTables\Views;

use Call\LaravelLivewireTables\Traits\WithParameters;

class Link extends Component
{
    use WithParameters;
    /**
     * Link constructor.
     *
     * @param $text
     */
    public function __construct($text = false)
    {
        if ($text) {
            $this->options['text'] = $text;
        }
    }

    /**
     * @param $text
     *
     * @return self
     */
    public static function make($text): self
    {
        return new static($text);
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
     * @param $href
     *
     * @return $this
     */
    public function href($href): self
    {
        return $this->setAttribute('href', $href);
    }

    /**
     * @param $model
     *
     * @return $this
     */
    public function destroy($route): self
    {
        return $this->href(function($model) use($route) {
            return route(sprintf('admin.%s.destroy', $route), $this->getUpdatesQueryParameters($model));
        });
    }

    /**
     * @param $model
     *
     * @return $this
     */
    public function edit($route): self
    {
        return $this->href(function($model) use ($route) {
            return route(sprintf('admin.%s.edit', $route), $this->getUpdatesQueryParameters($model));
        });
    }

    /**
     * @param $href
     *
     * @return $this
     */
    public function show($href): self
    {
        return $this->setAttribute('href', $href);
    }

    /**
     * @return string
     */
    public function view(): string
    {
        return table_views('components.link');
    }
}
