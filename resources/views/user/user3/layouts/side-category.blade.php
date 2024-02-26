<div class="col-lg-2">
    <!-- Navbar -->
    <div class="navbar-expand-lg">
        <!-- Navbar Toggle -->
        <div class="d-grid">
            <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenuEg1" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenuEg1">
            <span class="d-flex justify-content-between align-items-center">
              <span class="text-dark">Danh mục</span>

              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>

              <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
            </span>
            </button>
        </div>
        <!-- End Navbar Toggle -->

        <!-- Navbar Collapse -->
        <div id="navbarVerticalNavMenuEg1" class="collapse navbar-collapse">
            <div class="d-grid gap-4 flex-grow-1">
                @php
                    $cats = resolve(\App\Services\User\User3\Category\GetAllService::class)->handle(\App\Models\Category::TYPE_DOCUMENT);
                @endphp
                @foreach($cats as $cat)
                <div style="margin-bottom: -20px" class="d-grid">
                    <a href="">
                        <h5 style="padding-left: 0px" class="dropdown-header">{{ $cat->title }}</h5>
                    </a>
                    @foreach($cat->childrenRecursive as $childCat)
                        <a class="dropdown-item item-category" href="#">Top rated</a>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Navbar Collapse -->
    </div>
    <!-- End Navbar -->
</div>
<!-- End Col -->
