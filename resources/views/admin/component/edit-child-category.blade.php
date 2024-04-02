<div>
    <div class="category" style="display: flex;align-items: center;">
        <input class="radio" type="checkbox" value="{{ $category->id }}" @if($editCategory->parent_id == $category->id) checked @endif name="category_id" style="width: 18px;height: 18px;">
        <span style="margin-left: 10px">{{ $category->title }}</span>
    </div>

    <div style="margin-left: 15px;">
        @foreach($category->childrenRecursive as $cat)
            @if($editCategory->id != $cat->id)
                @include('admin.component.edit-child-category', [
                    'category' => $cat,
                    'editCategory' => $editCategory,
                ])
            @endif
        @endforeach
    </div>
</div>
