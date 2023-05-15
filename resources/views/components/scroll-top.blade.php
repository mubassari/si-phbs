<a class="scroll-to-top text-white rounded">
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
            line-height: 46px;
            color: #fff;
            background: rgba(90, 92, 105, 0.5);
        }

        .scroll-to-top:focus,
        .scroll-to-top:hover {
            color: #fff;
            background: #5a5c69;
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).on("scroll", () => {
            const $scrollToTop = $(".scroll-to-top");
            $(document).scrollTop() > 100 ?
                $scrollToTop.fadeIn(300) :
                $scrollToTop.fadeOut(300);
        });

        $(".scroll-to-top").on("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
@endpush
