<div>
    <div style="display: flex;align-items: center;">
        <input class="radio" type="checkbox" value="{{ $category->id }}" @if($editCategory->id == $category->id) checked @endif name="category_id" style="width: 18px;height: 18px;">
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

@push('script')
    <script>
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script>

@endpush
