<div class="offcanvas offcanvas-start" tabindex="-1" id="lv-mobile-main-menu">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title">Danh mục</h2>
        <a data-bs-dismiss="offcanvas">
            <i class="fa fa-times"></i>
        </a>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('user.search') }}">
            <div class="input-group">
                <input value="{{ $keyword ?? null }}" style="border-radius: 0" value="" type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." aria-label="Keyword" aria-describedby="basic-addon1">
            </div>
        </form>
        <div class="mobile-menu">
            <ul>
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'active' : null }}">
                    <span class="title">
                        <i class="fas fa-home"></i>
                        Trang chủ
                    </span>
                    </a>
                </li>
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'active' : null }}">
                    <span class="title">
                        <i class="fas fa-home"></i>
                        Trang chủ
                    </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
