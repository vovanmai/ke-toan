<div>
    <div style="display: flex;align-items: center;">
        <input class="radio" type="radio" value="{{ $category->id }}" @if($editCategory->id == $category->id) checked @endif name="category_id" style="width: 18px;height: 18px;">
        <span style="margin-left: 10px">{{ $category->title }}</span>
    </div>

    <div style="margin-left: 15px;">
        @foreach($category->childrenRecursive as $cat)
            @include('admin.component.edit-child-category-other', [
                'category' => $cat,
                'editCategory' => $editCategory,
            ])
        @endforeach
    </div>
</div>
