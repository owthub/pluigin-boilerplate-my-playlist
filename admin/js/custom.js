jQuery(document).ready(function () {
    jQuery('#example').DataTable();

    jQuery("#media-gallery").on("click", function () {
        var images = wp.media({
            title: "Upload Image for Boileplate",
            multiple: true
        }).open().on("select", function () {
            var html = '';
            var uploaded_images = images.state().get("selection");
            var files = uploaded_images.toJSON();
            jQuery.each(files, function (index, item) {
                html += item.url + ",";
            });
            jQuery("#upload-img").val(html);
        });
    });

    jQuery("#frmAddPlaylist").validate({
        submitHandler: function () {
            var postdata = jQuery("#frmAddPlaylist").serialize() + "&action=boiler_ajax&param=add_playlist";

            jQuery.post(plugin_vars.ajaxurl, postdata, function (response) {
                console.log(response);
            });
        }
    });

});

