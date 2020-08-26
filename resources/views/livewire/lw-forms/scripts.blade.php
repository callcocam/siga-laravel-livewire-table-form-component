@push('scripts')
    <script>
        // Code is inspired by Pastor Ryan Hayden
        // https://github.com/livewire/livewire/issues/106
        // Thank you, sir!
        document.querySelectorAll('input[type="file"]').forEach(file => {
            file.addEventListener('input', event => {
                console.log(event)
                let form_data = new FormData();
                form_data.append('component', @json($component));
                form_data.append('field_name', file.id);
                for (let i = 0; i < event.target.files.length; i++) {
                    form_data.append('files[]', event.target.files[i]);
                }
                axios.post('{{ route('lw-forms.file-upload') }}', form_data, {
                    headers: {'Content-Type': 'multipart/form-data'}
                }).then(response => {
                    window.livewire.emit('fileUpdate', response.data.field_name, response.data.uploaded_files);
                });
            })
        });
        document.addEventListener("livewire:load", function(event) {
             window.livewire.hook('afterDomUpdate', () => {
                setTimeout(()=>{
                    $('.close').click()
                }, 5000)
            });
        });
    </script>
@endpush
