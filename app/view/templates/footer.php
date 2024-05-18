
<div id="background" class="fixed hidden overflow-hidden top-0 left-0 w-full h-full bg-800 bg-opacity-75 "></div>
<script src="<?= BASEURL ?>js/overlay_menu.js"></script>
<script src="<?= BASEURL ?>js/script.js"></script>
<script>
    function pathFind(pathName) {

        var pathArray = window.location.pathname.split('/');
        var lokasi = pathArray[pathArray.length - 1];
        var url = '<?= BASEURL ?>' + pathName;
        var lokasi = window.location.href;

        // alert(lokasi);

        if (lokasi == url)
            overlayClose();
        else {
            if (pathName == undefined) {
                overlayClose();
                window.location.href = '<?= BASEURL ?>';
            } else {
                overlayClose();
                window.location.href = '<?= BASEURL ?>' + pathName;
            }
        }
    }

    window.onload = DropDownCheck;

</script>
</body>

</html>