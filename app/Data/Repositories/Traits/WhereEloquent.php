<?php

namespace App\Data\Repositories\Traits;

trait WhereEloquent
{

    /**
     * Where not null
     *
     * @param string $columns Columns.
     *
     * @return $this
     */
    public function whereNotNull(string $columns)
    {
        $this->model = $this->model->whereNotNull($columns);

        return $this;
    }

    /**
     * Where null
     *
     * @param string $columns Columns.
     *
     * @return $this
     */
    public function whereNull(string $columns)
    {
        $this->model = $this->model->whereNull($columns);

        return $this;
    }

    /**
     * Where data by field and value
     *
     * @param string $field    Field.
     * @param mixed  $value    Value.
     * @param string $operator Operator.
     *
     * @return $this
     */
    public function whereByField(string $field, $value = null, string $operator = '=')
    {
        $this->model = $this->model->where($field, $operator, $value);

        return $this;
    }

    /**
     * Where In
     *
     * @param string $field Field.
     * @param mixed  $value Value.
     *
     * @return $this
     */
    public function whereIn(string $field, array $value)
    {
        $this->model = $this->model->whereIn($field, $value);

        return $this;
    }

    /**
     * First data by multiple fields and throw exception if not found
     *
     * @param array $where   List condition
     * @param array $columns Columns
     *
     * @return mixed
     */
    public function firstOrFailWhere(array $where, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        $this->applyConditions($where);
        $model = $this->model->select($columns)->firstOrFail();
        $this->resetModel();
        $this->resetScope();
        $this->resetCriteria();

        return $this->parserResult($model);
    }
}
