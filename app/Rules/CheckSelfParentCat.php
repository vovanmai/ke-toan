<?php

namespace App\Rules;

use App\Data\Repositories\Eloquent\CategoryRepository;
use Illuminate\Contracts\Validation\Rule;

class CheckSelfParentCat implements Rule
{
    public $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $catEdit = app(CategoryRepository::class)->with('childrenRecursive')->find($this->id)->toArray();

        $cannotUpdateIds = [];

        array_walk_recursive($catEdit, function ($item, $key) use (&$cannotUpdateIds) {
            if ($key == 'id') {
                $cannotUpdateIds[] = $item;
            }
        });

        return !in_array($value, $cannotUpdateIds);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.invalid', ['attribute' => trans('validation.attributes.parent_id')]);
    }
}
