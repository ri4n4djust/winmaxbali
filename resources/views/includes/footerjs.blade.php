<script src="{{asset('assets/js/core.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script>
    const popupContainer = document.getElementById('popupContainer');
    const popupContent =
        document.getElementById('popupContent');
        popupContainer.addEventListener
            ('mouseover', function () {
                popupContent.style.display = 'block';
            });
        popupContainer.addEventListener
            ('mouseout', function () {
                popupContent.style.display = 'none';
        });
</script>