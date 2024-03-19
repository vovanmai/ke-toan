<div>
    <div style="display: flex;align-items: center;">
        <input class="radio" type="radio" @if(($old ?? null) == $category->id) checked @endif value="{{ $category->id }}" name="category_id" style="width: 18px;height: 18px;">
        <span style="margin-left: 10px">{{ $category->title }}</span>
    </div>

    <div style="margin-left: 30px;">
        @foreach($category->childrenRecursive as $category)
            @include('admin.component.child-category', ['category' => $category])
        @endforeach
    </div>
</div>
