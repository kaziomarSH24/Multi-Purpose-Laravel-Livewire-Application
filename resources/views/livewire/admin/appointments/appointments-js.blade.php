@push('js')
     <!-- Tempusdominus Bootstrap 4 / datetimepicker js -->
    <script src="https://unpkg.com/moment"></script>
    <script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
     <!-- CKEditor cdn -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
     <!-- bootstrap color picker -->
    <script src="{{asset('backend')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script>
        //color picker with addon
        $('#colorPicker').colorpicker().on('colorpickerChange', function(event){
            $('#colorPicker .fa-square').css('color',event.color.toString());
        })
    </script>
@endpush

@push('js')

<script>
    //CKEditor
    ClassicEditor.create( document.querySelector( '#note' ) );
    //form submit without every ajax request
    $('#submitAppointment').submit(function (e) { 
        e.preventDefault();
        @this.set('state.members',$('#teamMembers').val());
        @this.set('state.note', $('#note').val());
        @this.set('state.color', $('[name=color]').val());
    });
  </script>
@endpush
