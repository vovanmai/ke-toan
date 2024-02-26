<?php

namespace App\Data\Repositories\Traits;

use Closure;

trait TclEloquent
{

    /**
     * Resolve Database Connection
     *
     * @return mixed
     */
    protected function resolveDatabase()
    {
        return app('db');
    }

    /**
     * Begin Database Transaction
     *
     * @return void
     */
    public function beginTransaction()
    {
        $database = $this->resolveDatabase();
        $database->beginTransaction();
    }

    /**
     * Rollback Database Transaction
     *
     * @return void
     */
    public function rollback()
    {
        $database = $this->resolveDatabase();
        $database->rollback();
    }

    /**
     * Commit Database Transaction
     *
     * @return void
     */
    public function commit()
    {
        $database = $this->resolveDatabase();
        $database->commit();
    }

    /**
     * Callback Database Transaction
     *
     * @param Closure $closure Closure transaction.
     *
     * @return mixed
     */
    public function transaction(Closure $closure)
    {
        $database = $this->resolveDatabase();
        return $database->transaction($closure);
    }
}
