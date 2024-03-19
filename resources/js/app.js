import { ClassicEditor } from '@ckeditor/ckeditor5-editor-classic';
import { SimpleUploadAdapter } from '@ckeditor/ckeditor5-upload';

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        extraPlugins: [ SimpleUploadAdapter ],
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        simpleUpload: {
            uploadUrl: '/your/upload/url',
        }
    } )
    .catch( error => {
        console.error( error );
    } );
