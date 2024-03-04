<?php

namespace App\Data\Repositories\Eloquent;

use App\Data\Repositories\Traits\DmlEloquent;
use App\Data\Repositories\Traits\JoinEloquent;
use App\Data\Repositories\Traits\WhereEloquent;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

abstract class AppBaseRepository extends BaseRepository
{
    use JoinEloquent;
    use WhereEloquent;
    use DmlEloquent;

    /**
     * Search by basic where clause to the query.
     *
     * @param array $searchData Data to search
     *
     * @return $this
     */
    public function search(array $searchData)
    {
        foreach ($searchData as $field => $value) {

            if (isset($value) && $value !== '' && !is_null($value)) {
                $searchable = $this->fieldSearchable[$field];
                if (!empty($searchable)) {
                    $column = array_key_exists('column', $searchable) ? $searchable['column'] : $field;
                    $operator = array_key_exists('operator', $searchable) ? $searchable['operator'] : '=';
                    $type = array_key_exists('type', $searchable) ? $searchable['type'] : 'normal';
                } else {
                    $column = $field;
                    $operator = '=';
                    $type = 'normal';
                }

                if ($type === 'raw') {
                    $column = DB::raw($column);
                }

                if ('in' == $operator) {
                    $value = is_string($value) ? explode(",", $value) : $value;
                    if ($value = array_filter($value)) {
                        $this->model = $this->model->whereIn($column, $value);
                    }
                } else {
                    if ('date' == $type) {
                        $this->model = $this->model->whereDate($column, $operator, $value);
                    } else {
                        if ('between' == $operator) {
                            $this->model = $this->model->whereBetween($column, $value);
                        } else {
                            if ('like' == $operator || 'ilike' == $operator) {
                                $value = '%' . $value . '%';
                            }
                            $this->model = $this->model->where($column, $operator, $value);
                        }
                    }
                }
            }
        }
        return $this;
    }

    /**
     * Retrieve first data by multiple fields
     *
     * @param array $where   Conditions.
     * @param mixed $columns Columns.
     *
     * @return mixed
     * @throws RepositoryException Repository.
     */
    public function firstWhere(array $where, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        $this->applyConditions($where);

        $model = $this->model->first($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Insert to database
     *
     * @param array $data Data insert.
     *
     * @return mixed
     */
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    /**
     * Update where
     *
     * @param array $where   Conditions to update.
     * @param array $columns Columns update.
     *
     * @return mixed
     * @throws RepositoryException Repository.
     */
    public function updateWhere(array $where, array $columns)
    {
        $this->applyScope();
        $this->applyCriteria();

        $this->applyConditions($where);

        $result = $this->model->update($columns);

        $this->resetModel();
        return $result;
    }

    /**
     * Update where id in ids
     *
     * @param string $field   Field.
     * @param array  $values  Array values contain fields.
     * @param array  $columns Columns to update.
     *
     * @return mixed
     * @throws RepositoryException Repository.
     */
    public function updateWhereIn(string $field, array $values, array $columns)
    {
        $this->applyScope();
        $this->applyCriteria();

        $result = $this->model->whereIn($field, $values)
            ->update($columns);

        $this->resetModel();
        return $result;
    }

    /**
     * Chunk by Id
     *
     * @param integer     $count    Count to chunk.
     * @param callable    $callback Callback.
     * @param string|null $column   Column to get.
     * @param string|null $alias    Alias.
     *
     * @return mixed
     * @throws RepositoryException Repository.
     */
    public function chunkById(int $count, callable $callback, $column = null, $alias = null)
    {
        $this->applyScope();
        $this->applyCriteria();

        $model = $this->model->chunkById($count, $callback, $column, $alias);

        $this->resetModel();
        return $model;
    }

    /**
     * Chunk the results of the query.
     *
     * @param int      $limit    limit get
     * @param callable $callback Function call back
     *
     * @return boolean
     *
     * @throws RepositoryException
     */
    public function chunk(int $limit, callable $callback)
    {
        $this->applyCriteria();
        $this->applyScope();

        $offset = 0;

        do {
            $results = $this->model->offset($offset)->limit($limit)->get();

            $countResults = $results->count();

            if ($countResults == 0) {
                break;
            }

            // On each chunk result set, we will pass them to the callback and then let the
            // developer take care of everything within the callback, which allows us to
            // keep the memory low for spinning through large result sets for working.
            if (call_user_func($callback, $results) === false) {
                $this->resetModel();
                return false;
            }

            $offset += $limit;
        } while (true);

        $this->resetModel();

        return true;
    }

    /**
     * Get data soft delete.
     *
     * @return mixed
     */
    public function withTrashed()
    {
        return $this->model->withTrashed();
    }

    /**
     * Union
     *
     * @param mixed $clause Clause.
     *
     * @return mixed
     * @throws RepositoryException Repository.
     */
    public function union($clause)
    {
        $this->applyScope();
        $this->applyCriteria();
        $this->resetModel();
        $model = $this->model->union($clause);
        $this->resetModel();

        return $model;
    }

    /**
     * Order by columns
     *
     * @param array $columns Columns.
     *
     * @return $this
     */
    public function orderByColumns(array $columns)
    {
        foreach ($columns as $column => $direction) {
            $this->orderBy($column, $direction);
        }

        return $this;
    }

    /**
     * Join table
     *
     * @param string      $table    Table to join.
     * @param mixed       $first    First column.
     * @param string|null $operator Operator.
     * @param string|null $second   Second column.
     *
     * @return mixed
     * @throws RepositoryException Repository.
     */
    public function join(string $table, $first, $operator = null, $second = null)
    {
        $this->model = $this->model->join($table, $first, $operator, $second);

        return $this;
    }

    /**
     * Join table
     *
     * @param string      $table    Table to join.
     * @param mixed       $first    First column.
     * @param string|null $operator Operator.
     * @param string|null $second   Second column.
     *
     * @return mixed
     */
    public function leftJoin(string $table, $first, $operator = null, $second = null)
    {
        $this->model = $this->model->leftJoin($table, $first, $operator, $second);

        return $this;
    }

    /**
     * Parser result pagination
     *
     * @param mixed $result Result pagination
     *
     * @return array
     */
    public function parserResultPaginate($result)
    {
        $response = $result->toArray();
        $response['items'] = $response['data'];
        unset($response['data']);

        return $response;
    }

    /**
     * Lock for update
     *
     * @return $this
     */
    public function lockForUpdate()
    {
        $this->model = $this->model->lockForUpdate();

        return $this;
    }

    /**
     * Allow validator
     *
     * @return $this
     */
    public function disableValidator()
    {
        $this->validator = null;

        return $this;
    }

    /**
     * To sql
     *
     * @return $this
     */
    public function toSql()
    {
        return $this->model->toSql();
    }
}
