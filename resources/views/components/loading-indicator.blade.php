@props(['target' => null ])

<div wire:loading.delay @if ($target != null)
    wire:target="{{$target}}"
@endif>
    <div class="d-flex justify-content-center align-items-center position-fixed bg-dark "   style="background:#000; top:0; left:0; z-index:99999999; width:100%; height:100%; opacity: 0.8">
        <div class="la-ball-fussion la-white la-2x">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        </div>
    </div>
</div>

@once
@push('styles')
    <style>
        /*!
    * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
    * Copyright 2015 Daniel Cardoso <@DanielCardoso>
    * Licensed under MIT
    * For Loading-indicator
    */
    .la-ball-fussion,
    .la-ball-fussion > div {
        position: relative;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
                box-sizing: border-box;
    }
    .la-ball-fussion {
        display: block;
        font-size: 0;
        color: #fff;
    }
    .la-ball-fussion.la-dark {
        color: #333;
    }
    .la-ball-fussion > div {
        display: inline-block;
        float: none;
        background-color: currentColor;
        border: 0 solid currentColor;
    }
    .la-ball-fussion {
        width: 8px;
        height: 8px;
    }
    .la-ball-fussion > div {
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 100%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        -webkit-animation: ball-fussion-ball1 1s 0s ease infinite;
        -moz-animation: ball-fussion-ball1 1s 0s ease infinite;
            -o-animation: ball-fussion-ball1 1s 0s ease infinite;
                animation: ball-fussion-ball1 1s 0s ease infinite;
    }
    .la-ball-fussion > div:nth-child(1) {
        top: 0;
        left: 50%;
        z-index: 1;
    }
    .la-ball-fussion > div:nth-child(2) {
        top: 50%;
        left: 100%;
        z-index: 2;
        -webkit-animation-name: ball-fussion-ball2;
        -moz-animation-name: ball-fussion-ball2;
            -o-animation-name: ball-fussion-ball2;
                animation-name: ball-fussion-ball2;
    }
    .la-ball-fussion > div:nth-child(3) {
        top: 100%;
        left: 50%;
        z-index: 1;
        -webkit-animation-name: ball-fussion-ball3;
        -moz-animation-name: ball-fussion-ball3;
            -o-animation-name: ball-fussion-ball3;
                animation-name: ball-fussion-ball3;
    }
    .la-ball-fussion > div:nth-child(4) {
        top: 50%;
        left: 0;
        z-index: 2;
        -webkit-animation-name: ball-fussion-ball4;
        -moz-animation-name: ball-fussion-ball4;
            -o-animation-name: ball-fussion-ball4;
                animation-name: ball-fussion-ball4;
    }
    .la-ball-fussion.la-sm {
        width: 4px;
        height: 4px;
    }
    .la-ball-fussion.la-sm > div {
        width: 6px;
        height: 6px;
    }
    .la-ball-fussion.la-2x {
        width: 16px;
        height: 16px;
    }
    .la-ball-fussion.la-2x > div {
        width: 24px;
        height: 24px;
    }
    .la-ball-fussion.la-3x {
        width: 24px;
        height: 24px;
    }
    .la-ball-fussion.la-3x > div {
        width: 36px;
        height: 36px;
    }
    /*
    * Animations
    */
    @-webkit-keyframes ball-fussion-ball1 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 100%;
            z-index: 2;
            opacity: .35;
        }
    }
    @-moz-keyframes ball-fussion-ball1 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 100%;
            z-index: 2;
            opacity: .35;
        }
    }
    @-o-keyframes ball-fussion-ball1 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 100%;
            z-index: 2;
            opacity: .35;
        }
    }
    @keyframes ball-fussion-ball1 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 100%;
            z-index: 2;
            opacity: .35;
        }
    }
    @-webkit-keyframes ball-fussion-ball2 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 100%;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @-moz-keyframes ball-fussion-ball2 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 100%;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @-o-keyframes ball-fussion-ball2 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 100%;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @keyframes ball-fussion-ball2 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: 200%;
            opacity: 1;
        }
        100% {
            top: 100%;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @-webkit-keyframes ball-fussion-ball3 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 0;
            z-index: 2;
            opacity: .35;
        }
    }
    @-moz-keyframes ball-fussion-ball3 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 0;
            z-index: 2;
            opacity: .35;
        }
    }
    @-o-keyframes ball-fussion-ball3 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 0;
            z-index: 2;
            opacity: .35;
        }
    }
    @keyframes ball-fussion-ball3 {
        0% {
            opacity: .35;
        }
        50% {
            top: 200%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 50%;
            left: 0;
            z-index: 2;
            opacity: .35;
        }
    }
    @-webkit-keyframes ball-fussion-ball4 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @-moz-keyframes ball-fussion-ball4 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @-o-keyframes ball-fussion-ball4 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    @keyframes ball-fussion-ball4 {
        0% {
            opacity: .35;
        }
        50% {
            top: -100%;
            left: -100%;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 50%;
            z-index: 1;
            opacity: .35;
        }
    }
    </style>
@endpush
@endonce