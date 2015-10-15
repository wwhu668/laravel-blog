
@include('editor::head')

<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "添加标签"
        });
    });
</script>
