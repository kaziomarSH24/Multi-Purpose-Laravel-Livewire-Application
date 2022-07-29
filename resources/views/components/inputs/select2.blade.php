@props(['placeholder' => 'Select Options','id'])

{{-- @dd($attributes->whereStartsWith('wire:model')->first()) --}}

<div wire:ignore>
    <select id="{{$id}}" multiple="multiple" data-placeholder="{{$placeholder}}" style="width: 100%;">
        {{$slot}}
    </select>
</div>


@once
    @push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @endpush
@endonce

@once
    @push('js')
    <!-- Select2 -->
    <script src="{{asset('backend')}}/plugins/select2/js/select2.full.min.js"></script>
    @endpush    
@endonce

@push('js')
    <script>
        $(function(){
            //Initialize Select2 Elements
            $('#{{ $id }}').select2({
                theme: 'bootstrap4'
            }).on('change', function (){
                // alert('here');
                @this.set('{{$attributes->whereStartsWith('wire:model')->first()}}',$(this).val());
            });
        })
    </script>
@endpush