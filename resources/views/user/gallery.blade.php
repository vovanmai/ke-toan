<div id="gallery" class="block">
    <div class="heading-block">
        <div class="block-title">
            <a title="Hình ảnh các hoạt động">Hình ảnh các hoạt động</a>
        </div>
    </div>
    @php
        $courseImages = resolve(\App\Services\User\CourseImage\ListService::class)->handle();
    @endphp
    <div class="f-carousel" id="my-gallery">
        @php
            $courseImages = resolve(\App\Services\User\CourseImage\ListService::class)->handle();
        @endphp

        @foreach($courseImages as $courseImage)
            <div
                class="f-carousel__slide"
                data-fancybox="gallery-dpt"
                data-src="{{ $courseImage->image['url'] ?? null }}"
                data-thumb-src="{{ $courseImage->image['url'] ?? null }}"
            >
                <img
                    data-lazy-src="{{ $courseImage->image['url'] ?? null }}"
                    alt="Hình ảnh các hoạt động của Đào tạo kế toán, đại lý thuế DPT - công ty cổ phần tổng hợp DPT"
                />
            </div>
        @endforeach
    </div>
</div>
