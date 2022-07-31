@props(['target' => null, 'type' => 'submit'])
{{-- @dump($target) --}}
<button type="{{$type}}" {{$attributes->merge(['class' => 'btn btn-primary'])}}>
    <i wire:loading @if ($target != null) wire:target="{{$target}}" @endif class="fa-duotone fa-spinner-third fa-pulse mr-1"></i>
    {{$slot}}
</button>
