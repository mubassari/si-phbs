<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-4 col-form-label">{{ $label }}</label>
    <div class="col-sm-8">
        <textarea {{ $attributes }} name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
            id="{{ $id }}" placeholder="{{ $plc ?? '' }}">{!! !isset($old) ? old($name, $itemValue ?? '') : '' !!}</textarea>
        <x-events.error-message :error="$name" />
    </div>
</div>

@push('script')
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/lang/summernote-id-ID.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/plugin/sticky-toolbar/summernote-sticky-toolbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/plugin/cleaner/summernote-cleaner.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#{{ $id }}').summernote({
                lang: 'id-ID',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                        'subscript', 'clear'
                    ]],
                    ['fontname', ['fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['insert', ['hr', 'link','video']],
                    ['misc', ['undo', 'redo', 'fullscreen', 'help']],
                ],
                stickyToolbar: {
                    enabled: true, // enable/disable sticky toolbar
                    offset: 0, //y offset from top
                    zIndex: 9999 //z-index of the toolbar
                },
                cleaner: {
                    action: 'paste', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
                    icon: '<i class="note-icon"><svg xmlns="http://www.w3.org/2000/svg" id="libre-paintbrush" viewBox="0 0 14 14" width="14" height="14"><path d="m 11.821425,1 q 0.46875,0 0.82031,0.311384 0.35157,0.311384 0.35157,0.780134 0,0.421875 -0.30134,1.01116 -2.22322,4.212054 -3.11384,5.035715 -0.64956,0.609375 -1.45982,0.609375 -0.84375,0 -1.44978,-0.61942 -0.60603,-0.61942 -0.60603,-1.469866 0,-0.857143 0.61608,-1.419643 l 4.27232,-3.877232 Q 11.345985,1 11.821425,1 z m -6.08705,6.924107 q 0.26116,0.508928 0.71317,0.870536 0.45201,0.361607 1.00781,0.508928 l 0.007,0.475447 q 0.0268,1.426339 -0.86719,2.32366 Q 5.700895,13 4.261155,13 q -0.82366,0 -1.45982,-0.311384 -0.63616,-0.311384 -1.0212,-0.853795 -0.38505,-0.54241 -0.57924,-1.225446 -0.1942,-0.683036 -0.1942,-1.473214 0.0469,0.03348 0.27455,0.200893 0.22768,0.16741 0.41518,0.29799 0.1875,0.130581 0.39509,0.24442 0.20759,0.113839 0.30804,0.113839 0.27455,0 0.3683,-0.247767 0.16741,-0.441965 0.38505,-0.753349 0.21763,-0.311383 0.4654,-0.508928 0.24776,-0.197545 0.58928,-0.31808 0.34152,-0.120536 0.68974,-0.170759 0.34821,-0.05022 0.83705,-0.07031 z"/></svg></i>',
                    keepHtml: true,
                    keepTagContents: ['span'], //Remove tags and keep the contents
                    badTags: ['applet', 'col', 'colgroup', 'embed', 'noframes', 'noscript', 'script',
                        'style', 'title', 'meta', 'link', 'head'
                    ], //Remove full tags with contents
                    badAttributes: ['bgcolor', 'border', 'height', 'cellpadding', 'cellspacing', 'lang',
                        'start', 'style', 'valign', 'width', 'data-(.*?)'
                    ], //Remove attributes from remaining tags
                    limitChars: 0, // 0|# 0 disables option
                    limitDisplay: 'both', // none|text|html|both
                    limitStop: false, // true/false
                    notTimeOut: 850, //time before status message is hidden in miliseconds
                    imagePlaceholder: 'https://via.placeholder.com/200'
                }
            });
        });
    </script>
@endpush
@push('style')
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush