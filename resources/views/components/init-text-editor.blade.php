<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.text-editor',
        skin: localStorage.getItem('_x_darkMode') === 'true' ? 'oxide-dark' : 'oxide',
        plugins: 'code table lists',
        language: '{{ app()->getLocale() }}',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
