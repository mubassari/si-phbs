<!-- Scroll to top -->
<a class="scroll-to-top text-white rounded" onclick="window.scrollTo(0, 0)">
    <i class="fas fa-angle-up"></i>
</a>

@push('style')
    <style>
        .scroll-to-top {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            display: none;
            width: 2.75rem;
            height: 2.75rem;
            text-align: center;
            color: #fff;
            background: rgba(90, 92, 105, 0.5);
            line-height: 46px;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .scroll-to-top:focus,
        .scroll-to-top:hover {
            color: #fff;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .scroll-to-top:hover {
            background: #5a5c69;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .scroll-to-top i {
            font-weight: 800;
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).on("scroll", function() {
            var scrollDistance;
            $(this).scrollTop() > 100 ?
                $(".scroll-to-top").fadeIn() :
                $(".scroll-to-top").fadeOut();
        });
    </script>
@endpush
