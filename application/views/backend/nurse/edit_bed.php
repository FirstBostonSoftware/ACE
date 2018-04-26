<?php
$rooms = $this->db->select('room_number')->get('room')->result_array();
$room_numbers = array_column($rooms, 'room_number');

$single_bed_info = $this->db->get_where('bed', array('bed_id' => $param2))->result_array();

foreach ($single_bed_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('edit_bed'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('nurse/bed/update/'.$row['bed_id']); ?>" 
                        method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('bed_number'); ?></label>

                            <div class="col-sm-7">
                                <input type="number" name="bed_number" class="form-control" id="field-1" value="<?php echo $row['bed_number']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('room_number'); ?></label>

                            <div class="col-sm-7">
                                <select name="room_number" class="form-control select" required>
                                    <option value=""><?php echo get_phrase('select_room_number'); ?></option>
                                    <?php foreach($room_numbers as $room_number){?>
                                        <option value="<?php echo $room_number; ?>" 
                                            <?php if($row['room_number'] == $room_number) { echo 'selected'; }?>><?php echo $room_number?></option>
                                    <?php }?>
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
