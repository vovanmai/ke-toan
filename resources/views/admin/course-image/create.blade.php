<div class="modal fade" id="create-course-image-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="create-course-image-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thêm ảnh</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Chọn hình ảnh<span class="required">(*)</span>
                        </label>
                        <div class="col-md-8">
                            <input type="file" name="files" multiple class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button id="infileid" type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@push('script')
    <script>
        $('#create-course-image-modal').on('hidden.bs.modal', function (e) {
            const file = document.querySelector('input[name=files]');
            file.value = '';
        })

        $("#create-course-image-form").on('submit', function(e) {
            e.preventDefault();
            createCourseImages()
        });

        function uploadToServer (file) {
            return new Promise(function(resolve, reject) {
                const formData = new FormData()
                formData.append('file', file)
                $.ajax({
                    data: formData,
                    type: 'POST',
                    url: '/admin/upload-file',
                    processData: false,
                    contentType: false,
                    cache:false,
                    params: {
                        key: "course-image-"
                    },
                    success: function(response)
                    {
                        resolve(response.data);
                    },
                    error: function(error) {
                    }
                });
            });


        }

        function createCourseImages () {
            const listFiles = $('input[name=files]')[0].files
            let promises = []
            for (const file of listFiles) {
                promises.push(uploadToServer(file))
            }

            Promise.all(promises).then(response => {
                $.ajax({
                    data: { images: response },
                    type: 'POST',
                    url: '/admin/course-images',
                    cache:false,
                    success: function(response)
                    {
                        window.location.href = '/admin/course-images'
                    },
                    error: function(error) {

                    }
                });
            })
        }
    </script>
@endpush
