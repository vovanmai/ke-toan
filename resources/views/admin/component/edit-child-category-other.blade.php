@if($editCategory->id != $cat->id)
    <div>
        <div class="category" style="display: flex;align-items: center;">
            <input class="radio" type="checkbox" value="{{ $category->id }}" @if($editCategory->parent_id == $category->id || $category->id == old('category_id')) checked @endif name="category_id" style="width: 18px;height: 18px;">
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
@endif
