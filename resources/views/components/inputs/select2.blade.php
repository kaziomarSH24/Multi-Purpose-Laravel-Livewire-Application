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
    <style>
        .select2-selection{
            box-shadow: none !important;
        }
        .custom-error .select2-selection{
            border: none;
            min-height: calc(1.5em + .75rem + 0px) !important;
        }
        .custom-error{
            border: 1px solid #dc3545;
            border-radius: 0.25rem;
            padding-right: 2.25rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        }
    </style>
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
            });

            // <!-- This mathod sending AJAX request for every changes -->

            // .on('change', function (){
            //     // alert('here');
            //     @this.set('{{$attributes->whereStartsWith('wire:model')->first()}}',$(this).val());
            // });

            // <!-- This mathod sending AJAX request for every changes -->
        });
    </script>
@endpush