@extends('Layout.page1')
@section('lib')
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">--}}
@stop
{{--<script src={{asset("/row-grid.js")}}></script>--}}
@section('style-css')

    <style>
        /*--------------------pagination------------------*/
        * {
            font-family: 'Poppins';
        }
        a:hover {
            cursor: pointer;
        }
        #pagination {
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align:center;
        }
        #pagination ul {
            list-style: none;
            text-align:center;
            padding: 0;
            display: flex;
        }
        #pagination ul li {
            color: #fff;
            display: flex;
        }
        #pagination ul li a {
            background-color: #f29620;
            padding: 5px 10px;
            border: 2px solid #3D315B;
            border-right: 0;
        }
        #pagination ul li.active a {
            background-color: #9AB87A;
        }
        #pagination ul li:first-child a {
            border-radius: 5px 0 0 5px;
        }
        #pagination ul li:last-child a {
            border-radius: 0 5px 5px 0;
            border-right: 2px solid #3D315B;
        }
        /*-----------------end----------*/
        /**
         * Add the correct display in IE 9-.
         */
        article,
        aside,
        footer,
        header,
        nav,
        section {
            display: block;
        }
        /**
         * Correct the font size and margin on `h1` elements within `section` and
         * `article` contexts in Chrome, Firefox, and Safari.
         */
        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }
        /* Grouping content
           ========================================================================== */
        /**
         * Add the correct display in IE 9-.
         * 1. Add the correct display in IE.
         */
        figcaption,
        figure,
        main {
            /* 1 */
            display: block;
        }
        /**
         * Add the correct margin in IE 8.
         */
        figure {
            margin: 1em 40px;
        }
        /**
         * 1. Add the correct box sizing in Firefox.
         * 2. Show the overflow in Edge and IE.
         */
        hr {
            box-sizing: content-box;
            /* 1 */
            height: 0;
            /* 1 */
            overflow: visible;
            /* 2 */
        }
        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */
        pre {
            font-family: monospace, monospace;
            /* 1 */
            font-size: 1em;
            /* 2 */
        }
        /* Text-level semantics
           ========================================================================== */
        /**
         * 1. Remove the gray background on active links in IE 10.
         * 2. Remove gaps in links underline in iOS 8+ and Safari 8+.
         */
        a {
            background-color: transparent;
            /* 1 */
            -webkit-text-decoration-skip: objects;
            /* 2 */
        }
        /**
         * 1. Remove the bottom border in Chrome 57- and Firefox 39-.
         * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
         */
        abbr[title] {
            border-bottom: none;
            /* 1 */
            text-decoration: underline;
            /* 2 */
            text-decoration: underline dotted;
            /* 2 */
        }
        /**
         * Prevent the duplicate application of `bolder` by the next rule in Safari 6.
         */
        b,
        strong {
            font-weight: inherit;
        }
        /**
         * Add the correct font weight in Chrome, Edge, and Safari.
         */
        b,
        strong {
            font-weight: bolder;
        }
        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */
        code,
        kbd,
        samp {
            font-family: monospace, monospace;
            /* 1 */
            font-size: 1em;
            /* 2 */
        }
        /**
         * Add the correct font style in Android 4.3-.
         */
        dfn {
            font-style: italic;
        }
        /**
         * Add the correct background and color in IE 9-.
         */
        mark {
            background-color: #ff0;
            color: #000;
        }
        /**
         * Add the correct font size in all browsers.
         */
        small {
            font-size: 80%;
        }
        /**
         * Prevent `sub` and `sup` elements from affecting the line height in
         * all browsers.
         */
        sub,
        sup {
            font-size: 75%;
            line-height: 0;.
            position: relative;
            vertical-align: baseline;
        }
        sub {
            bottom: -0.25em;
        }
        sup {
            top: -0.5em;
        }
        /* Embedded content
           ========================================================================== */
        /**
         * Add the correct display in IE 9-.
         */
        audio,
        video {
            display: inline-block;
        }
        /**
         * Add the correct display in iOS 4-7.
         */
        audio:not([controls]) {
            display: none;
            height: 0;
        }
        /**
         * Remove the border on images inside links in IE 10-.
         */
        img {
            border-style: none;
        }
        /**
         * Hide the overflow in IE.
         */
        svg:not(:root) {
            overflow: hidden;
        }
        /* Forms
           ========================================================================== */
        /**
         * 1. Change the font styles in all browsers (opinionated).
         * 2. Remove the margin in Firefox and Safari.
         */
        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: sans-serif;
            /* 1 */
            font-size: 100%;
            /* 1 */
            line-height: 1.15;
            /* 1 */
            margin: 0;
            /* 2 */
        }
        /**
         * Show the overflow in IE.
         * 1. Show the overflow in Edge.
         */
        button,
        input {
            /* 1 */
            overflow: visible;
        }
        /**
         * Remove the inheritance of text transform in Edge, Firefox, and IE.
         * 1. Remove the inheritance of text transform in Firefox.
         */
        button,
        select {
            /* 1 */
            text-transform: none;
        }
        /**
         * 1. Prevent a WebKit bug where (2) destroys native `audio` and `video`
         *    controls in Android 4.
         * 2. Correct the inability to style clickable types in iOS and Safari.
         */
        button,
        html [type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button;
            /* 2 */
        }
        /**
         * Remove the inner border and padding in Firefox.
         */
        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }
        /**
         * Restore the focus styles unset by the previous rule.
         */
        button:-moz-focusring,
        [type="button"]:-moz-focusring,
        [type="reset"]:-moz-focusring,
        [type="submit"]:-moz-focusring {
            outline: 1px dotted ButtonText;
        }
        /**
         * Correct the padding in Firefox.
         */
        fieldset {
            padding: 0.35em 0.75em 0.625em;
        }
        /**
         * 1. Correct the text wrapping in Edge and IE.
         * 2. Correct the color inheritance from `fieldset` elements in IE.
         * 3. Remove the padding so developers are not caught out when they zero out
         *    `fieldset` elements in all browsers.
         */
        legend {
            box-sizing: border-box;
            /* 1 */
            color: inherit;
            /* 2 */
            display: table;
            /* 1 */
            max-width: 100%;
            /* 1 */
            padding: 0;
            /* 3 */
            white-space: normal;
            /* 1 */
        }
        /**
         * 1. Add the correct display in IE 9-.
         * 2. Add the correct vertical alignment in Chrome, Firefox, and Opera.
         */
        progress {
            display: inline-block;
            /* 1 */
            vertical-align: baseline;
            /* 2 */
        }
        /**
         * Remove the default vertical scrollbar in IE.
         */
        textarea {
            overflow: auto;
        }
        /**
         * 1. Add the correct box sizing in IE 10-.
         * 2. Remove the padding in IE 10-.
         */
        [type="checkbox"],
        [type="radio"] {
            box-sizing: border-box;
            /* 1 */
            padding: 0;
            /* 2 */
        }
        /**
         * Correct the cursor style of increment and decrement buttons in Chrome.
         */
        [type="number"]::-webkit-inner-spin-button,
        [type="number"]::-webkit-outer-spin-button {
            height: auto;
        }
        /**
         * 1. Correct the odd appearance in Chrome and Safari.
         * 2. Correct the outline style in Safari.
         */
        [type="search"] {
            -webkit-appearance: textfield;
            /* 1 */
            outline-offset: -2px;
            /* 2 */
        }
        /**
         * Remove the inner padding and cancel buttons in Chrome and Safari on macOS.
         */
        [type="search"]::-webkit-search-cancel-button,
        [type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }
        /**
         * 1. Correct the inability to style clickable types in iOS and Safari.
         * 2. Change font properties to `inherit` in Safari.
         */
        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            /* 1 */
            font: inherit;
            /* 2 */
        }
        /* Interactive
           ========================================================================== */
        /*
         * Add the correct display in IE 9-.
         * 1. Add the correct display in Edge, IE, and Firefox.
         */
        details,
        menu {
            display: block;
        }
        /*
         * Add the correct display in all browsers.
         */
        summary {
            display: list-item;
        }
        /* Scripting
           ========================================================================== */
        /**
         * Add the correct display in IE 9-.
         */
        canvas {
            display: inline-block;
        }
        /**
         * Add the correct display in IE.
         */
        template {
            display: none;
        }
        /* Hidden
           ========================================================================== */
        /**
         * Add the correct display in IE 10-.
         */
        [hidden] {
            display: none;
        }
        html {
            height: 100%;
        }
        fieldset {
            margin: 0;
            padding: 0;
            -webkit-margin-start: 0;
            -webkit-margin-end: 0;
            -webkit-padding-before: 0;
            -webkit-padding-start: 0;
            -webkit-padding-end: 0;
            -webkit-padding-after: 0;
            border: 0;
        }
        legend {
            margin: 0;
            padding: 0;
            display: block;
            -webkit-padding-start: 0;
            -webkit-padding-end: 0;
        }
        /*===============================
        =            Choices            =
        ===============================*/
        .choices {
            position: relative;
            margin-bottom: 24px;
            font-size: 16px;
        }
        .choices:focus {
            outline: none;
        }
        .choices:last-child {
            margin-bottom: 0;
        }
        .choices.is-disabled .choices__inner, .choices.is-disabled .choices__input {
            background-color: #EAEAEA;
            cursor: not-allowed;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .choices.is-disabled .choices__item {
            cursor: not-allowed;
        }
        .choices[data-type*="select-one"] {
            cursor: pointer;
        }
        .choices[data-type*="select-one"] .choices__inner {
            padding-bottom: 7.5px;
        }
        .choices[data-type*="select-one"] .choices__input {
            display: block;
            width: 100%;
            padding: 10px;
            border-bottom: 1px solid #DDDDDD;
            background-color: #FFFFFF;
            margin: 0;
        }
        .choices[data-type*="select-one"] .choices__button {
            background-image: url("../../icons/cross-inverse.svg");
            padding: 0;
            background-size: 8px;
            height: 100%;
            position: absolute;
            top: 50%;
            right: 0;
            margin-top: -10px;
            margin-right: 25px;
            height: 20px;
            width: 20px;
            border-radius: 10em;
            opacity: .5;
        }
        .choices[data-type*="select-one"] .choices__button:hover, .choices[data-type*="select-one"] .choices__button:focus {
            opacity: 1;
        }
        .choices[data-type*="select-one"] .choices__button:focus {
            box-shadow: 0px 0px 0px 2px #00BCD4;
        }
        .choices[data-type*="select-one"]:after {
            content: "";
            height: 0;
            width: 0;
            border-style: solid;
            border-color: #333333 transparent transparent transparent;
            border-width: 5px;
            position: absolute;
            right: 11.5px;
            top: 50%;
            margin-top: -2.5px;
            pointer-events: none;
        }
        .choices[data-type*="select-one"].is-open:after {
            border-color: transparent transparent #333333 transparent;
            margin-top: -7.5px;
        }
        .choices[data-type*="select-one"][dir="rtl"]:after {
            left: 11.5px;
            right: auto;
        }
        .choices[data-type*="select-one"][dir="rtl"] .choices__button {
            right: auto;
            left: 0;
            margin-left: 25px;
            margin-right: 0;
        }
        .choices[data-type*="select-multiple"] .choices__inner, .choices[data-type*="text"] .choices__inner {
            cursor: text;
        }
        .choices[data-type*="select-multiple"] .choices__button, .choices[data-type*="text"] .choices__button {
            position: relative;
            display: inline-block;
            margin-top: 0;
            margin-right: -4px;
            margin-bottom: 0;
            margin-left: 8px;
            padding-left: 16px;
            border-left: 1px solid #008fa1;
            background-image: url("../../icons/cross.svg");
            background-size: 8px;
            width: 8px;
            line-height: 1;
            opacity: .75;
        }
        .choices[data-type*="select-multiple"] .choices__button:hover, .choices[data-type*="select-multiple"] .choices__button:focus, .choices[data-type*="text"] .choices__button:hover, .choices[data-type*="text"] .choices__button:focus {
            opacity: 1;
        }
        .choices__inner {
            display: inline-block;
            vertical-align: top;
            width: 100%;
            background-color: #f9f9f9;
            padding: 7.5px 7.5px 3.75px;
            border: 1px solid #DDDDDD;
            border-radius: 2.5px;
            font-size: 14px;
            min-height: 44px;
            overflow: hidden;
        }
        .is-focused .choices__inner, .is-open .choices__inner {
            border-color: #b7b7b7;
        }
        .is-open .choices__inner {
            border-radius: 2.5px 2.5px 0 0;
        }
        .is-flipped.is-open .choices__inner {
            border-radius: 0 0 2.5px 2.5px;
        }
        .choices__list {
            margin: 0;
            padding-left: 0;
            list-style: none;
        }
        .choices__list--single {
            display: inline-block;
            padding: 4px 16px 4px 4px;
            width: 100%;
        }
        [dir="rtl"] .choices__list--single {
            padding-right: 4px;
            padding-left: 16px;
        }
        .choices__list--single .choices__item {
            width: 100%;
        }
        .choices__list--multiple {
            display: inline;
        }
        .choices__list--multiple .choices__item {
            display: inline-block;
            vertical-align: middle;
            border-radius: 20px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 500;
            margin-right: 3.75px;
            margin-bottom: 3.75px;
            background-color: #00BCD4;
            border: 1px solid #00a5bb;
            color: #FFFFFF;
            word-break: break-all;
        }
        .choices__list--multiple .choices__item[data-deletable] {
            padding-right: 5px;
        }
        [dir="rtl"] .choices__list--multiple .choices__item {
            margin-right: 0;
            margin-left: 3.75px;
        }
        .choices__list--multiple .choices__item.is-highlighted {
            background-color: #00a5bb;
            border: 1px solid #008fa1;
        }
        .is-disabled .choices__list--multiple .choices__item {
            background-color: #aaaaaa;
            border: 1px solid #919191;
        }
        .choices__list--dropdown {
            display: none;
            z-index: 1;
            position: absolute;
            width: 100%;
            background-color: #FFFFFF;
            border: 1px solid #DDDDDD;
            top: 100%;
            margin-top: -1px;
            border-bottom-left-radius: 2.5px;
            border-bottom-right-radius: 2.5px;
            overflow: hidden;
            word-break: break-all;
        }
        .choices__list--dropdown.is-active {
            display: block;
        }
        .is-open .choices__list--dropdown {
            border-color: #b7b7b7;
        }
        .is-flipped .choices__list--dropdown {
            top: auto;
            bottom: 100%;
            margin-top: 0;
            margin-bottom: -1px;
            border-radius: .25rem .25rem 0 0;
        }
        .choices__list--dropdown .choices__list {
            position: relative;
            max-height: 300px;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            will-change: scroll-position;
        }
        .choices__list--dropdown .choices__item {
            position: relative;
            padding: 10px;
            font-size: 14px;
        }
        [dir="rtl"] .choices__list--dropdown .choices__item {
            text-align: right;
        }
        @media (min-width: 640px) {
            .choices__list--dropdown .choices__item--selectable {
                padding-right: 100px;
            }
            .choices__list--dropdown .choices__item--selectable:after {
                content: attr(data-select-text);
                font-size: 12px;
                opacity: 0;
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
            }
            [dir="rtl"] .choices__list--dropdown .choices__item--selectable {
                text-align: right;
                padding-left: 100px;
                padding-right: 10px;
            }
            [dir="rtl"] .choices__list--dropdown .choices__item--selectable:after {
                right: auto;
                left: 10px;
            }
        }
        .choices__list--dropdown .choices__item--selectable.is-highlighted {
            background-color: #f2f2f2;
        }
        .choices__list--dropdown .choices__item--selectable.is-highlighted:after {
            opacity: .5;
        }
        .choices__item {
            cursor: default;
        }
        .choices__item--selectable {
            cursor: pointer;
        }
        .choices__item--disabled {
            cursor: not-allowed;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            opacity: .5;
        }
        .choices__heading {
            font-weight: 600;
            font-size: 12px;
            padding: 10px;
            border-bottom: 1px solid #f7f7f7;
            color: gray;
        }
        .choices__button {
            text-indent: -9999px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 0;
            background-color: transparent;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
        }
        .choices__button:focus {
            outline: none;
        }
        .choices__input {
            display: inline-block;
            vertical-align: baseline;
            background-color: #f9f9f9;
            font-size: 14px;
            margin-bottom: 5px;
            border: 0;
            border-radius: 0;
            max-width: 100%;
            padding: 4px 0 4px 2px;
        }
        .choices__input:focus {
            outline: 0;
        }
        [dir="rtl"] .choices__input {
            padding-right: 2px;
            padding-left: 0;
        }
        .choices__placeholder {
            opacity: .5;
        }
        /*=====  End of Choices  ======*/
        * {
            box-sizing: border-box;
        }
        .s004 legend {
            font-size: 36px;
            color: #fff;
            font-weight: 800;
            text-align: center;
            margin-bottom: 50px;
        }
        .s004 .inner-form {
            width: 50%;
            /*margin-bottom: 17px;*/
            margin:auto;
        }
        .s004 .inner-form .input-field {
            width: 100%;
            position: relative;
        }
        .s004 .inner-form .input-field .choices {
            margin-bottom: 0;
        }
        .s004 .inner-form .input-field .choices .choices__inner {
            min-height: 70px;
            width: 100%;
            background: transparent;
            border: 0;
            background: #fff;
            display: block;
            width: 100%;
            padding: 10px 70px 10px 32px;
            font-size: 18px;
            color: #666;
            border-radius: 34px;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
        }
        .s004 .inner-form .input-field .choices .choices__inner .choices__list .choices__item {
            background: #e7e7e7;
            color: #333;
            line-height: 33px;
            border: 0;
            padding: 0 20px;
            font-size: 16px;
        }
        .s004 .inner-form .input-field .choices .choices__inner .choices__list .choices__item .choices__button {
            border-left: 0;
            color: #b2b2b2;
            background-image: url(../images/icons/close.svg);
            background-size: 14px auto;
            padding-left: 0;
            opacity: .3;
            transition: all .2s ease-out, color .2s ease-out;
        }
        .s004 .inner-form .input-field .choices .choices__inner .choices__list .choices__item .choices__button:hover {
            opacity: 1;
        }
        .s004 .inner-form .input-field .choices .choices__inner .choices__input {
            font-size: 16px;
            color: #333;
            background-color: transparent;
            margin-bottom: 0;
        }
        .s004 .inner-form .input-field .choices .choices__list--dropdown {
            background: transparent;
            font-size: 16px;
            color: #fff;
            border: 0;
            padding: 0 32px;
        }
        .s004 .inner-form .input-field .choices .choices__list--dropdown .choices__item {
            font-size: 13px;
            height: 25px;
            line-height: 1.3;
            padding: 0;
            padding-top: 5px;
            opacity: .7;
        }
        .s004 .inner-form .input-field .btn-search {
            width: 70px;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background: transparent;
            border: 0;
            padding: 0;
            cursor: pointer;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            align-items: center;
        }
        .s004 .inner-form .input-field .btn-search svg {
            fill: #333;
            width: 40px;
            height: 40px;
            transition: all .2s ease-out, color .2s ease-out;
        }
        .s004 .inner-form .input-field .btn-search:hover, .s004 form .inner-form .input-field .btn-search:focus {
            outline: 0;
            box-shadow: none;
        }
        .s004 .inner-form .input-field .btn-search:hover svg, .s004 form .inner-form .input-field .btn-search:focus svg {
            fill: #000;
        }
        .s004 .span {
            font-size: 14px;
            font-family: 'Helvetica', sans-serif;
            display: inline-block;
            padding: 0 15px;
            line-height: 32px;
            color: #fff;
            border-radius: 16px;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
    {{-----------------big-appear-img------------}}
    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        #myImg:hover {opacity: 0.7;}
        /* The Modal (background) */
        .modal {
            z-index: 100000 !important;
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }
        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        /* Add Animation */
        .modal-content, #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }
        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }
        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
    {{------------------button---------}}
    <style>
        .button::-moz-focus-inner{
            border: 0;
            padding: 0;
        }
        .button{
            display: inline-block;
            *display: inline;
            zoom: 1;
            padding: 6px 20px;
            margin: 0;
            cursor: pointer;
            border: 1px solid #bbb;
            overflow: visible;
            font: bold 13px arial, helvetica, sans-serif;
            text-decoration: none;
            white-space: nowrap;
            color: #555;
            background-color: #ddd;
            background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,1)), to(rgba(255,255,255,0)));
            background-image: -webkit-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
            background-image: -moz-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
            background-image: -ms-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
            background-image: -o-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
            background-image: linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
            -webkit-transition: background-color .2s ease-out;
            -moz-transition: background-color .2s ease-out;
            -ms-transition: background-color .2s ease-out;
            -o-transition: background-color .2s ease-out;
            transition: background-color .2s ease-out;
            background-clip: padding-box; /* Fix bleeding */
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
            -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
            box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
            text-shadow: 0 1px 0 rgba(255,255,255, .9);
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .button:hover{
            background-color: #eee;
            color: #555;
        }
        .button:active{
            background: #e9e9e9;
            position: relative;
            top: 1px;
            text-shadow: none;
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
        }
        .button[disabled], .button[disabled]:hover, .button[disabled]:active{
            border-color: #eaeaea;
            background: #fafafa;
            cursor: default;
            position: static;
            color: #999;
            /* Usually, !important should be avoided but here it's really needed :) */
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            text-shadow: none !important;
        }
        /* Smaller buttons styles */
        .button.small{
            padding: 4px 12px;
        }
        /* Larger buttons styles */
        .button.large{
            padding: 12px 30px;
            text-transform: uppercase;
        }
        .button.large:active{
            top: 2px;
        }
        /* Colored buttons styles */
        .button.green, .button.red, .button.blue {
            color: #fff;
            text-shadow: 0 1px 0 rgba(0,0,0,.2);
            background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,.3)), to(rgba(255,255,255,0)));
            background-image: -webkit-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
            background-image: -moz-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
            background-image: -ms-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
            background-image: -o-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
            background-image: linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
        }
        /* */
        .button.green{
            background-color: #57a957;
            border-color: #57a957;
        }
        .button.green:hover{
            background-color: #62c462;
        }
        .button.green:active{
            background: #57a957;
        }
        /* */
        .button.red{
            background-color: #ca3535;
            border-color: #c43c35;
        }
        .button.red:hover{
            background-color: #ee5f5b;
        }
        .button.red:active{
            background: #c43c35;
        }
        /* */
        .button.blue{
            background-color: #269CE9;
            border-color: #269CE9;
        }
        .button.blue:hover{
            background-color: #70B9E8;
        }
        .button.blue:active{
            background: #269CE9;
        }
        /* */
        .green[disabled], .green[disabled]:hover, .green[disabled]:active{
            border-color: #57A957;
            background: #57A957;
            color: #D2FFD2;
        }
        .red[disabled], .red[disabled]:hover, .red[disabled]:active{
            border-color: #C43C35;
            background: #C43C35;
            color: #FFD3D3;
        }
        .blue[disabled], .blue[disabled]:hover, .blue[disabled]:active{
            border-color: #269CE9;
            background: #269CE9;
            color: #93D5FF;
        }
        /* Group buttons */
        .button-group,
        .button-group li{
            display: inline-block;
            *display: inline;
            zoom: 1;
        }
        .button-group{
            font-size: 0; /* Inline block elements gap - fix */
            margin: 0;
            padding: 0;
            background: rgba(0, 0, 0, .1);
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            padding: 7px;
            -moz-border-radius: 7px;
            -webkit-border-radius: 7px;
            border-radius: 7px;
        }
        .button-group li{
            margin-right: -1px; /* Overlap each right button border */
        }
        .button-group .button{
            font-size: 13px; /* Set the font size, different from inherited 0 */
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
            border-radius: 0;
        }
        .button-group .button:active{
            -moz-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
            -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
            box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        }
        .button-group li:first-child .button{
            -moz-border-radius: 3px 0 0 3px;
            -webkit-border-radius: 3px 0 0 3px;
            border-radius: 3px 0 0 3px;
        }
        .button-group li:first-child .button:active{
            -moz-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
            -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
            box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        }
        .button-group li:last-child .button{
            -moz-border-radius: 0 3px 3px 0;
            -webkit-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
        }
        .button-group li:last-child .button:active{
            -moz-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset;
            -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset;
            box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        }
        .ok{
            display: none;
        }
        .show{
            display: block;
        }
        body{
            padding-top:120px!important;
        }
        @media only screen and (max-width: 500px){
            body{
                padding-top:100px!important;
            }
        }
        .masonry {
            column-count: 4;
            column-gap: 0.3em;
        }

        .item { /* Masonry bricks or child elements */
          background-color: #eee;
          display: inline-block;
          margin: 0 0 0.3em;
          width: 100%;
        }
        .item img{
            width:100%;
        }
        @media only screen and (max-width: 768px){
          .masonry {
            column-count: 3;
          }
        } 
        @media only screen and (max-width: 600px){
          .masonry {
            column-count: 1;
          }
        }
        #img_name {
          white-space: nowrap;
            width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            margin: 0 auto;
            text-align: center;
        }  
        #submit_btn {
            bottom: 65px;
            z-index: 8;
            float: right;
            margin-top: 10px;
            margin-right: 20px;
            position: fixed;
            right: 1;
            display: none;
        }      
    </style>
    <body>
    @stop
    @section('content')
 

        {{-----------------------------------------Search and Fillter---------------------------------------------------------------}}
        <div><a href="{{url('/cart')}}" class = " small green button"  style="float: right;background-color:;font-size: 20px;"><i class="fa fa-shopping-cart" aria-hidden="true">({{$cart_count}})</i></a></div>
        <div id ="nav" class="row">
            <div class="s004 col-6" style="width:300px;">
                    <div class="inner-form" style="margin-left:36px;margin-bottom:5px;width:200px;">
                        <div class="input-field">
                            <input class="form-control" id="choices-text-preset-values" type="text" size="200" placeholder="search..." />
                            <button class="btn-search" type="button" id = "click_search">
                               <i class="fa fa-search" style="font-size:24px"></i>
                            </button>
                        </div>
                    </div>
            </div>
            <div style="margin-left:50px;width:200px;">
                <select class="select col-6" id = "option_select" style = "flex: 0 0 50%; max-width: 100%; height: 35px;">
                    <option id = "click_search"  value = "Sort by latest">Sort by latest</option>                    
                    <option id = "click_search"  value = "Sort by popularity">Sort by popularity</option>
                    <option id = "click_search"  value = "Sort by average rating">Sort by average rating</option>
                    <option id = "click_search"  value = "Sort by price:low to high">Sort by price:low to high</option>
                    <option id = "click_search"  value = "Sort by price:high to low">Sort by price:high to low</option>
                </select>
            </div>
        </div>

        {{-----------------------------------------Search result number---------------------------------------------------}}
        <div id = "search_result" style="width: 444px; min-height: 40px;"> </div>

        {{-----------------------------------------pagination number temp--------------------------------------------------}}
        <h1 id="pagenum" style="display:none;">{{$page_number}}</h1>
     
        <h1 class="ps" style="display: none;"></h1>

        {{------------------------------------------First Image Show-------------------------------------------------------}}
        <div id="image_div" class="masonry">
            
            @for($i=$count1;$i<$count2;$i++) 
            
                <div class="item" style="padding: 10px" >
                    <div style = "background: none repeat scroll 0 0 #ffffff;    border: 1px solid #dedede;    box-sizing: border-box;    padding: 5px 5px 10px 4px; position: relative;">    
                        <div id = "muImg"><img src="{{$imgurl[$i]}}"></div>
                        <div id = "img_price" style = "position: absolute;bottom: 40px;padding: 2px 5px;" class="small green button">$0.99</div><div style = "position: absolute;right: 10px;bottom: 40px;"><a href = "{{url('/auction/'.$imgid[$i])}}"><button id = "{{$imgid[$i]}}" class = "small green button">Details!</button></a></div>  
                        
                        <div id = "img_name">{{$imgname[$i]}}</div>
                        <i id="dislike{{$imgid[$i]}}" class="fa fa-heart-o like " aria-hidden="true" style = "font-size: 30px; color: red; position: absolute;top: 35px;left: 10px; z-index: 7;" onclick="giveLike(0,{{$imgid[$i]}})"></i>
                        <i id="like{{$imgid[$i]}}" class="fa fa-heart like ok" aria-hidden="true" style = "font-size: 30px; color: red; position: absolute; top: 35px;left: 10px; z-index: 7;" onclick="giveLike(1,{{$imgid[$i]}})"></i> 
                        <i id="dislike1{{$imgid[$i]}}" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,{{$imgid[$i]}})" style = "font-size: 32px;   color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>
                        <i id="like1{{$imgid[$i]}}" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,{{$imgid[$i]}})" style = "font-size: 32px;  color:red;  position: absolute;top:35px; right:10px; z-index: 7;"></i> 
                    </div>
                   
                </div> 
            @endfor 
        </div>
        <button id="submit_btn" type="button" onclick="senddata()" class="btn btn-primary btn-lg" style = "float:right;">Submit</button>
        
        {{------------------------------------Pagination----------------------------------------------------------------------}}
        <div style="display: table; margin: auto;">
            <div id="pagination"></div>
        </div>
        {{----------------------------------------               Pagination                 ------------------------------}}
        <script>
            var input = document.getElementById("choices-text-preset-values");
            input.addEventListener("keyup", function(event) {
              if (event.keyCode === 13) {
              event.preventDefault();
              document.getElementById("click_search").click();
              }
            });    
        </script>        
        <script> 
            let pages = parseInt($('#pagenum').text()) ; 
            document.getElementById('pagination').innerHTML = createPagination(pages, 1);
            // createPagination();
            function createPagination(pages, page) { 
                let str = '<ul>';
                let active;
                let pageCutLow = page - 1;
                let pageCutHigh = page + 1;
                // Show the Previous button only if you are on a page other than the first
                if (page > 1) {
                    str += '<li class="page-item previous no"><a onclick="createPagination(pages, '+(page-1)+')">Previous</a></li>';
                }
                // Show all the pagination elements if there are less than 6 pages total
                if (pages < 6) {
                    for (let p = 1; p <= pages; p++) {
                        active = page == p ? "active" : "no";
                        str += '<li class="'+active+'"><a onclick="createPagination(pages, '+p+')">'+ p +'</a></li>';
                    }
                }
                // Use "..." to collapse pages outside of a certain range
                else {
                    // Show the very first page followed by a "..." at the beginning of the
                    // pagination section (after the Previous button)
                    if (page > 2) {
                        str += '<li class="no page-item"><a onclick="createPagination(pages, 1)">1</a></li>';
                        if (page > 3) {
                            str += '<li class="out-of-range"><a onclick="createPagination(pages,'+(page-2)+')">...</a></li>';
                        }
                    }
                    // Determine how many pages to show after the current page index
                    if (page === 1) {
                        pageCutHigh += 2;
                    } else if (page === 2) {
                        pageCutHigh += 1;
                    }
                    // Determine how many pages to show before the current page index
                    if (page === pages) {
                        pageCutLow -= 2;
                    } else if (page === pages-1) {
                        pageCutLow -= 1;
                    }
                    // Output the indexes for pages that fall inside the range of pageCutLow
                    // and pageCutHigh
                    for (let p = pageCutLow; p <= pageCutHigh; p++) {
                        if (p === 0) {
                            p += 1;
                        }
                        if (p > pages) {
                            continue
                        }
                        active = page == p ? "active" : "no";
                        str += '<li class="page-item '+active+'"><a onclick="createPagination(pages, '+p+')">'+ p +'</a></li>';
                    }
                    // Show the very last page preceded by a "..." at the end of the pagination
                    // section (before the Next button)
                    if (page < pages-1) {
                        if (page < pages-2) {
                            str += '<li class="out-of-range"><a onclick="createPagination(pages,'+(page+2)+')">...</a></li>';
                        }
                        str += '<li class="page-item no"><a onclick="createPagination(pages, pages)">'+pages+'</a></li>';
                    }
                }
                // Show the Next button only if you are on a page other than the last
                if (page < pages) {
                    str += '<li class="page-item next no"><a onclick="createPagination(pages, '+(page+1)+')">Next</a></li>';
                }
                str += '</ul>';
                // Return the pagination string to be outputted in the pug templates 
                getImage(page);
                document.getElementById('pagination').innerHTML = str;
                return str;
            }
            //------------pagination click event-------------------------------
            function getImage(page) {
                var keyword = $('#choices-text-preset-values').val();
                var option = $('#option_select').find(":selected").text();
                var  data = new FormData();
                data.append('keyword', keyword);
                data.append('page', page);
                data.append('option', option);
                $.ajax({
                    type: "POST",
                    url: '{{url('shop/image')}}',
                    data:data ,
                    processData: false, // high importance!
                    contentType:false ,
                    cache: false,
                    async:true,
                    enctype:'multipart/form-data',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        var obj = JSON.parse(response);
                        // pages = obj.data.page_number;
                        console.log(obj);
                    //   console.log('sdf'); //----------------------------------------------------------------------------------------------------
                        $('#image_div').html('');
                        for(var i=obj.data.count1;i<obj.data.count2;i++){
                            $('#image_div').append(
                                 
                                '<div class="item" style="padding: 10px" >' +
                                ' <div style = "background: none repeat scroll 0 0 #ffffff;    border: 1px solid #dedede;    box-sizing: border-box;    padding: 5px 5px 10px 4px; position: relative;">'+
                                '<div><img src="'+obj.data.imgurl[i]+'"></div>' +
                                '<div id = "img_price" style = "position: absolute;bottom: 40px;padding: 2px 5px;" class="small green button">$0.99</div>'+
                                '<a href ="'+"auction/"+obj.data.imgid[i]+'"><div style = "position: absolute;right: 10px;bottom: 40px;"><button id = "" class = "small green button">Details!</button></div></a>'+
                                '<div id = "img_name">'+obj.data.imgname[i]+'</div>' +
                                '<i id="dislike'+obj.data.imgid[i]+'" class="fa fa-heart-o like " aria-hidden="true" style = "font-size: 30px; color: red; position: absolute;top: 35px;left: 10px; z-index: 7;" onclick="giveLike(0,'+obj.data.imgid[i]+')"></i>'+
                                '<i id="like'+obj.data.imgid[i]+'" class="fa fa-heart like ok" aria-hidden="true" style = "font-size: 30px; color: red; position: absolute; top: 35px;left: 10px; z-index: 7;" onclick="giveLike(1,'+obj.data.imgid[i]+')"></i>'+
                                '<i id="dislike1'+obj.data.imgid[i]+'" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,'+obj.data.imgid[i]+')" style = "font-size: 32px;   color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>'+
                                '<i id="like1'+obj.data.imgid[i]+'" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,'+obj.data.imgid[i]+')" style = "font-size: 32px;  color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>'+
                                '</div>'+'</div>')
                        }
                        
                        
                        // <i id="dislike{{$imgid[$i]}}" class="fa fa-heart-o like " aria-hidden="true" style = "font-size: 30px; color: red; position: absolute;top: 35px;left: 10px; z-index: 7;" onclick="giveLike(0,{{$imgid[$i]}})"></i>
                        // <i id="like{{$imgid[$i]}}" class="fa fa-heart like ok" aria-hidden="true" style = "font-size: 30px; color: red; position: absolute; top: 35px;left: 10px; z-index: 7;" onclick="giveLike(1,{{$imgid[$i]}})"></i>
                        
                        // <i id="dislike1{{$imgid[$i]}}" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,{{$imgid[$i]}})" style = "font-size: 32px;   color:#0e0e0e;  position: absolute; top: 40px; left: 10px; z-index: 7;"></i>
                        // <i id="like1{{$imgid[$i]}}" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,{{$imgid[$i]}})" style = "font-size: 32px;  color:#0e0e0e;  position: absolute; top: 40px; left: 10px; z-index: 7;"></i>
                        
                        
                        
                        
                        // $('#search_result').text('Search results:'+(obj.data.total_search));
                        $(".btn_cart").click(function(){
                             
                            if($(this).text() =='ADD TO CART'){
                                $(this).text('Success! back');
                                //-------------
                                var btn_id = $(this).attr('id');
                                // alert(btn_id);
                                var flag ='add';
                                var  data = new FormData();
                                data.append('img_id', btn_id);
                                data.append('flag', flag);
                                $.ajax({
                                    type: "POST",
                                    url: '{{url('shop/cart')}}',
                                    data:data ,
                                    processData: false, // high importance!
                                    contentType:false ,
                                    cache: false,
                                    async:true,
                                    enctype:'multipart/form-data',
                                    beforeSend: function (request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                                    success: function(response){
                                        var obj = JSON.parse(response);
                                        console.log(obj);
                                    },
                                    error: function(response){
                                        alert('error');
                                    }
                                });
                                //    -------------
                            }
                            else{
                                $(this).text('ss');
                            }
                            if($(this).text() =='ss'){
                                $(this).text('ADD TO CART');
                                //-------------
                                var btn_id = $(this).attr('id');
                                var flag ='delete';
                                var  data = new FormData();
                                data.append('img_id', btn_id);
                                data.append('flag', flag);
                                $.ajax({
                                    type: "POST",
                                    url: '{{url('shop/cart')}}',
                                    data:data ,
                                    processData: false, // high importance!
                                    contentType:false ,
                                    cache: false,
                                    async:true,
                                    enctype:'multipart/form-data',
                                    beforeSend: function (request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                                    success: function(response){
                                        var obj = JSON.parse(response);
                                        console.log(obj);
                                    },
                                    error: function(response){
                                        alert('error');
                                    }
                                });
                                //    -------------
                            }
                            
                        });
                        
                        //------------------------------------------------------------------------------------------------------------------
                    },
                    error: function(response){
                        // console.log(response);
                        alert('error');
                    }
                });
            }
        </script>

        {{-------------------------------------------------------------------------Click search button --------------------}}
        <script>
            $('#click_search').click(function(){
                
                var first_page = 1;
                var keyword = $('#choices-text-preset-values').val();
                var option = $('#option_select').find(":selected").text();
                console.log(keyword);
                console.log(option);
                console.log(first_page);
                var  data = new FormData();
                data.append('keyword', keyword);
                data.append('page', 1);
                data.append('option', option);
               
                $.ajax({
                    type: "POST",
                    url: '{{url('shop/image')}}',
                    data:data ,
                    processData: false, // high importance!
                    contentType:false ,
                    cache: false,
                    async:true,
                    enctype:'multipart/form-data',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        var obj = JSON.parse(response);
                        console.log(obj); 
                       
                        $('#image_div').html('');
                        for(var i=obj.data.count1;i<obj.data.count2;i++){
                            $('#image_div').append(
                                 
                                '<div class="item" style="padding: 10px" >' +
                                ' <div style = "background: none repeat scroll 0 0 #ffffff;    border: 1px solid #dedede;    box-sizing: border-box;    padding: 5px 5px 10px 4px; position: relative;">'+
                                '<div><img src="'+obj.data.imgurl[i]+'"></div>' +
                                '<div id = "img_price" style = "position: absolute;bottom: 40px;padding: 2px 5px;" class="small green button">$0.99</div>'+ 
                                '<a href = "'+"auction/"+obj.data.imgid[i]+'"><div style = "position: absolute;right: 10px;bottom: 40px;"><button id = "" class = "small green button">Details!</button></div></a>'+
                                '<div id = "img_name">'+obj.data.imgname[i]+'</div>' +
                                '<i id="dislike'+obj.data.imgid[i]+'" class="fa fa-heart-o like " aria-hidden="true" style = "font-size: 30px; color: red; position: absolute;top: 35px;left: 10px; z-index: 7;" onclick="giveLike(0,'+obj.data.imgid[i]+')"></i>'+
                                '<i id="like'+obj.data.imgid[i]+'" class="fa fa-heart like ok" aria-hidden="true" style = "font-size: 30px; color: red; position: absolute; top: 35px;left: 10px; z-index: 7;" onclick="giveLike(1,'+obj.data.imgid[i]+')"></i>'+
                                '<i id="dislike1'+obj.data.imgid[i]+'" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,'+obj.data.imgid[i]+')" style = "font-size: 32px;   color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>'+
                                '<i id="like1'+obj.data.imgid[i]+'" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,'+obj.data.imgid[i]+')" style = "font-size: 32px;  color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>'+
                                '</div>'+'</div>')
                        }
                        $('#search_result').text('Search results:'+(obj.data.total_search));
                        // console.log(obj.data.imgurl.length);
                        $('#pagenum').html('');
                        pages = obj.data.page_number;
                        if(pages==1){document.getElementById('pagination').innerHTML = createPagination(0, 1);}
                        else{
                            document.getElementById('pagination').innerHTML = createPagination(pages, 1);
                        }
                        $(".btn_cart").click(function(){
                            alert('sssd');
                            var btn_id = $(this).attr('id');
                            var  data = new FormData();
                            alert(btn_id);
                            data.append('img_id', btn_id);
                            if($(this).text() =='ADD TO CART'){
                                $(this).text('Success! back');
                                data.append('flag', 'add');
                            }
                            else{
                                $(this).text('ADD TO CART');
                                data.append('flag', 'delete');
                            }
                            $.ajax({
                                type: "POST",
                                url: '{{url("shop/cart")}}',
                                data:data ,
                                processData: false, // high importance!
                                contentType:false ,
                                cache: false,
                                async:true,
                                enctype:'multipart/form-data',
                                beforeSend: function (request) {
                                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                },
                                success: function(response){
                                    var obj = JSON.parse(response);
                                    console.log(obj);
                                },
                                error: function(response){
                                    var obj = JSON.parse(response);
                                    console.log(obj);
                                }
                            });
                        });
                    },
                    error: function(response){
                        // console.log(response);
                        alert('error');
                    }
                });
            });
        </script>

        {{-------------------------------------------------------------------------Option Click------------------------------}}
        <script>
            $('#option_select').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                // alert(valueSelected);
                var first_page = 1;
                var keyword = $('#choices-text-preset-values').val();
                var option =  valueSelected;
                console.log(keyword);
                console.log(option);
                console.log(first_page);
                var  data = new FormData();
                data.append('keyword', keyword);
                data.append('page', 1);
                data.append('option', option);
                $.ajax({
                    type: "POST",
                    url: '{{url('shop/image')}}',
                    data:data ,
                    processData: false, // high importance!
                    contentType:false ,
                    cache: false,
                    async:true,
                    enctype:'multipart/form-data',
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        var obj = JSON.parse(response);
                        console.log(obj);
                               console.log('sdssf');
                        //----------------------------------------------------
                        $('#image_div').html('');
                        for(var i=obj.data.count1;i<obj.data.count2;i++){
                            $('#image_div').append(
                                 
                                '<div class="item" style="padding: 10px" >' +
                                ' <div style = "background: none repeat scroll 0 0 #ffffff;    border: 1px solid #dedede;    box-sizing: border-box;    padding: 5px 5px 10px 4px; position: relative;">'+
                                '<div><img src="'+obj.data.imgurl[i]+'"></div>' +
                                '<div id = "img_price" style = "position: absolute;bottom: 40px;padding: 2px 5px;" class="small green button">$0.99</div>'+
                                '<a href = "'+"auction/"+obj.data.imgid[i]+'"><div style = "position: absolute;right: 10px;bottom: 40px;"><button id = "" class = "small green button">Details!</button></div></a>'+
                                '<div id = "img_name">'+obj.data.imgname[i]+'</div>' +
                                '<i id="dislike'+obj.data.imgid[i]+'" class="fa fa-heart-o like " aria-hidden="true" style = "font-size: 30px; color: red; position: absolute;top: 35px;left: 10px; z-index: 7;" onclick="giveLike(0,'+obj.data.imgid[i]+')"></i>'+
                                '<i id="like'+obj.data.imgid[i]+'" class="fa fa-heart like ok" aria-hidden="true" style = "font-size: 30px; color: red; position: absolute; top: 35px;left: 10px; z-index: 7;" onclick="giveLike(1,'+obj.data.imgid[i]+')"></i>'+
                                '<i id="dislike1'+obj.data.imgid[i]+'" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,'+obj.data.imgid[i]+')" style = "font-size: 32px;   color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>'+
                                '<i id="like1'+obj.data.imgid[i]+'" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,'+obj.data.imgid[i]+')" style = "font-size: 32px;  color:red;  position: absolute; top:35px; right:10px; z-index: 7;"></i>'+
                                '</div>'+'</div>')
                        }
                        $('#search_result').text('Search results:'+(obj.data.total_search));
                        pages = obj.data.page_number;
                        if(pages==1){document.getElementById('pagination').innerHTML = createPagination(0, 1);}
                        else{
                            document.getElementById('pagination').innerHTML = createPagination(pages, 1);
                        }
                        $(".btn_cart").click(function(){
                            // var btn_id = $(this).attr('id');
                            // $(this).append('ttt');
                            if($(this).text() =='ADD TO CART'){
                                $(this).text('Success! back');
                                //-------------
                                var btn_id = $(this).attr('id');
                                var flag ='add';
                                var  data = new FormData();
                                data.append('img_id', btn_id);
                                data.append('flag', flag);
                                $.ajax({
                                    type: "POST",
                                    url: '{{url('shop/cart')}}',
                                    data:data ,
                                    processData: false, // high importance!
                                    contentType:false ,
                                    cache: false,
                                    async:true,
                                    enctype:'multipart/form-data',
                                    beforeSend: function (request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                                    success: function(response){
                                        var obj = JSON.parse(response);
                                        console.log(obj);
                                    },
                                    error: function(response){
                                        // alert('error');
                                        var obj = JSON.parse(response);
                                        console.log(obj);
                                    }
                                });
                                //    -------------
                            }
                            else{
                                $(this).text('ss');
                            }
                            if($(this).text() =='ss'){
                                $(this).text('ADD TO CART');
                                //-------------
                                var btn_id = $(this).attr('id');
                                var flag ='delete';
                                var  data = new FormData();
                                data.append('img_id', btn_id);
                                data.append('flag', flag);
                                $.ajax({
                                    type: "POST",
                                    url: '{{url('shop/cart')}}',
                                    data:data ,
                                    processData: false, // high importance!
                                    contentType:false ,
                                    cache: false,
                                    async:true,
                                    enctype:'multipart/form-data',
                                    beforeSend: function (request) {
                                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                                    },
                                    success: function(response){
                                        var obj = JSON.parse(response);
                                        console.log(obj);
                                    },
                                    error: function(response){
                                        alert('error');
                                    }
                                });
                                //    -------------
                            }
                        });
                    },
                    error: function(response){
                        alert('error');
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $(".btn_cart").click(function(){
                    alert('sss');
                    var btn_id = $(this).attr('id');
                    var  data = new FormData();
                    alert(btn_id);
                    data.append('img_id', btn_id);
                    if($(this).text() =='ADD TO CART'){
                        $(this).text('Success! back');
                        data.append('flag', 'add');
                    }
                    else{
                        $(this).text('ADD TO CART');
                        data.append('flag', 'delete');
                    }
                    $.ajax({
                        type: "POST",
                        url: '{{url("shop/cart")}}',
                        data:data ,
                        processData: false, // high importance!
                        contentType:false ,
                        cache: false,
                        async:true,
                        enctype:'multipart/form-data',
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function(response){
                            var obj = JSON.parse(response);
                            console.log(obj);
                        },
                        error: function(response){
                            var obj = JSON.parse(response);
                            console.log(obj);
                        }
                    });
                });
            });
        </script>
        <script>

        $(document).ready(function() {
            //alert("document ready occurred!");
            $('#preloader').css('display','none');

        });
      
        var likearry=[];
        var question=[];
     
        
        function giveLike(flag, imageid) {
            console.log(flag);
            console.log(imageid);
            flag==0?$('#like'+imageid).addClass('show'):$('#like'+imageid).removeClass('show');
            if (likearry.indexOf(imageid)<0){
                likearry.push(imageid);
                
            } else{
              
                likearry.splice(likearry.indexOf(imageid));
            }
            $('#submit_btn').show();
            // console.log(likearry);
        }
        
        function giveLike1(flag, imageid) {
            console.log(flag);
            console.log(imageid);
            flag==0?$('#like1'+imageid).addClass('show'):$('#like1'+imageid).removeClass('show');
            if (question.indexOf(imageid)<0){
                question.push(imageid);
              
            } else{
                
                question.splice(question.indexOf(imageid));
            }
            // console.log(question);
            $('#submit_btn').show();
        }
          
        
        function senddata() {
            var uid=getCookie('id');
            console.log(uid);
            $.ajax({
                url: '{{url('voting/set1')}}',
                type: 'post',
                data: {likearry:likearry,question:question, uid:uid} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //console.log(response);
                    var obj = JSON.parse(response); 
                    location.reload(); 
                },
                error: function(response){

                    console.log(response);
                    alert('error11');

                }
            });
        }
        
        document.addEventListener("contextmenu", function(e){
            e.preventDefault();
        }, false);

    </script>
 

        {{----------------------------------------------------------------------------------------------------------------}}
    @stop
    @section('javascript')
        <script>
        </script>

@stop