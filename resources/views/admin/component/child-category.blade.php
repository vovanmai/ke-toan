<div>
    <div class="category" style="display: flex;align-items: center;">
        <input class="radio" type="checkbox" @if((old('category_id') ?? null) == $category->id) checked @endif value="{{ $category->id }}" name="category_id" style="width: 18px;height: 18px;">
        <span style="margin-left: 10px">{{ $category->title }}</span>
    </div>

    @if($category->childrenRecursive->isNotEmpty())
        <div style="margin-left: 30px;">
            @foreach($category->childrenRecursive as $category)
                @include('admin.component.child-category', ['category' => $category])
            @endforeach
        </div>
    @endif
</div>
