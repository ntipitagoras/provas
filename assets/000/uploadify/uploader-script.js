<script>
    $(document).ready(function () {
 
        var base_url = '<?php echo base_url(); ?>';
 
        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#userfile').uploadify('upload', '*');
        });
 
        $('#userfile').uploadify({
            'auto':false,
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'assets/javascript/jquery/uploadify_31/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photo(s)',
            'multi':true,
            'removeCompleted':false
        });
    });
</script>