 @props(['id','error'])  {{-- For dynamic ID attributes --}}

{{-- @dump($id) --}}

<input {{$attributes{{-- ->merge(['class' => 'form-control datetimepicker-input'])--}} }} type="text" class="form-control datetimepicker-input @error($error) is-invalid @enderror" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}" onchange="this.dispatchEvent(new InputEvent('input'))"/>


@push('js')
<script type="text/javascript">
    $(function () {
        $('#{{ $id }}').datetimepicker({
            format:'LT',
        });
    });
</script>
@endpush