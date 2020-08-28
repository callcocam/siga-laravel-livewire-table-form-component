<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Traits;


trait Table
{
    /**
     * Table.
     */

    /**
     * Whether or not to display the table header.
     *
     * @var bool
     */
    public $tableHeaderEnabled = true;

    /**
     * Whether or not to display the table footer.
     *
     * @var bool
     */
    public $tableFooterEnabled = false;

    /**
     * The class to set on the table.
     *
     * @var string
     */
    public $tableClass = 'table align-items-center table-flush';

    /**
     * The class to set on the thead of the table.
     *
     * @var string
     */
    public $tableHeaderClass = 'thead-light';

    /**
     * The class to set on the tfoot of the table.
     *
     * @var string
     */
    public $tableFooterClass = '';

    /**
     * false is off
     * string is the tables wrapping div class.
     *
     * @var bool
     */
    public $responsive = 'table-responsive';

    /**
     *
     * @return string|null
     */
    public function getTitle()
    {
        return "Basic Table";
    }

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadClass($attribute)
    {
        return null;
    }

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadId($attribute)
    {
        return null;
    }

    /**
     * @param $attribute
     *
     * @return array|null
     */
    public function setTableHeadAttributes($attribute)
    {
        return [];
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowClass($model)
    {
        return null;
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowId($model)
    {
        return null;
    }

    /**
     * @param $model
     *
     * @return array
     */
    public function setTableRowAttributes($model)
    {
        return [];
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataClass($attribute, $value)
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataId($attribute, $value)
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return array
     */
    public function setTableDataAttributes($attribute, $value)
    {
        return [];
    }
}
