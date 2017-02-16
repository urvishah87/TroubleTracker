<script src="<?php echo base_url(); ?>assets/js/add_feed.js" type="text/javascript" charset="utf-8"></script>
<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("feeds") . ""; ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <?php echo "Add Feed"; ?>
        </li>
    </ul>
    <div class="page-header">
        <h2>
            Adding Feed
        </h2>
    </div>

    <?php
    //flash messages
    if (isset($flash_message)) {
        if ($flash_message == TRUE) {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new product created with success.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
            echo '</div>';
        }
    }
    ?>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    $options_category = array('' => "Select");

    foreach ($categories as $row) {
        $options_category[$row['category_id']] = $row['category_name'];
    }

    //form validation
    echo validation_errors();

    echo form_open_multipart('feeds/addFeed', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="category_id" class="control-label">Category</label>
            <div class="controls">

                <?php echo form_dropdown('tt_category', $options_category, set_value('category_id'), 'class="span2"'); ?>

            </div>
        </div>

        <div class="control-group">
            <label for="inputError" class="control-label">Address</label>
            <div class="controls">
                <textarea name="tt_address" id="tt_address" required="required"> </textarea>

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
                <textarea name="tt_comment" id="tt_comment" required="required"> </textarea>
                  <!--<span class="help-inline">Cost Price</span>-->
            </div>
        </div>          
        <div class="control-group">
            <label for="inputError" class="control-label">Photo</label>
            <div class="controls">
                <input type="file" name="tt_image" id="tt_image"/>
               <!--<span class="help-inline">Cost Price</span>-->
            </div>
        </div>
        <div class="control-group">
            <label for="tt_publishstatus" class="control-label">Status</label>
            <div class="controls">

                <?php 
                $options_status["1"]="Open";
                $options_status["2"]="In Progress";
                $options_status["3"]="Complete";
                $options_status["4"]="Reject";
                
                
                echo form_dropdown('tt_publishstatus', $options_status, set_value('tt_publishstatus'), 'class="span2"'); ?>

            </div>
        </div>
        <input type="hidden" name="tt_lat" id="tt_lat" value="" />
         <input type="hidden" name="tt_lng" id="tt_lng" value="" />
        
        <div class = "form-actions">
            <button class = "btn btn-primary" type = "submit" name="btn_feed" id="btn_feed">Save</button>
            <button class = "btn" type = "reset" name="btn_cancel" id="btn_cancel">Cancel</button>
        </div>
    </fieldset>

    <?php echo form_close();
    ?>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYkZXV8pCcj00uf0q9tM-tvq75udy2sf4"></script>
