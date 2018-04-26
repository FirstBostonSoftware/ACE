<?php
$single_room_info = $this->db->get_where('room', array('room_id' => $param2))->result_array();
foreach ($single_room_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('edit_room'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('nurse/room/update/'.$row['room_id']); ?>" 
                        method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('room_number'); ?></label>

                            <div class="col-sm-7">
                                <input type="number" name="room_number" class="form-control" id="field-1" value="<?php echo $row['room_number']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('type'); ?></label>

                            <div class="col-sm-7">
                                <select name="type" class="form-control select" required>
                                    <option value=""><?php echo get_phrase('select_type'); ?></option>
                                    <option value="ward" <?php if ($row['type'] == 'ward')echo 'selected';?>>
                                        <?php echo get_phrase('ward'); ?>
                                    </option>
                                    <option value="cabin" <?php if ($row['type'] == 'cabin')echo 'selected';?>>
                                        <?php echo get_phrase('cabin'); ?>
                                    </option>
                                    <option value="icu" <?php if ($row['type'] == 'icu')echo 'selected';?>>
                                        <?php echo get_phrase('icu'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('floor'); ?></label>

                            <div class="col-sm-7">
                                <select name="floor" class="form-control select" required>
                                    <option value=""><?php echo get_phrase('select_floor'); ?></option>
                                    <option value="1" <?php if ($row['floor'] == '1')echo 'selected';?>>1</option>
                                    <option value="2" <?php if ($row['floor'] == '2')echo 'selected';?>>2</option>
                                    <option value="3" <?php if ($row['floor'] == '3')echo 'selected';?>>3</option>
                                    <option value="4" <?php if ($row['floor'] == '4')echo 'selected';?>>4</option>
                                    <option value="5" <?php if ($row['floor'] == '5')echo 'selected';?>>5</option>
                                    <option value="6" <?php if ($row['floor'] == '6')echo 'selected';?>>6</option>
                                    <option value="7" <?php if ($row['floor'] == '7')echo 'selected';?>>7</option>
                                    <option value="8" <?php if ($row['floor'] == '8')echo 'selected';?>>8</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                            <div class="col-sm-7">
                                <textarea rows="5" name="description" class="form-control"
                                          id="field-ta"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-3 control-label col-sm-offset-1">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> <?php echo get_phrase('update');?>
                            </button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>