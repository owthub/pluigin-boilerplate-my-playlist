<?php wp_enqueue_media(); ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Add Playlist
            <a href="admin.php?page=owt-playlist" class="btn btn-info pull-right" style="margin-top:-10px;">All Playlist</a>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="javascript:void(0)" id="frmAddPlaylist">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Playlist Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" required="" id="name" placeholder="Enter name">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="file">Upload Images:</label>
                    <div class="col-sm-10">
                        <!--input type="file" class="form-control" name="file" id="file"-->
                        <button class="btn btn-info" type="button" id="media-gallery">Upload Image from Media</button>
                        <input type="hidden" id="upload-img" name="upload_img" value=""/>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>