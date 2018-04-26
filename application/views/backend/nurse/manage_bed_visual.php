<div class="row">
    <div class="col-sm-3">
        <select name="floor" class="form-control">
            <option value="">Select Floor</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
    </div>
    <div class="col-sm-3">
        <select name="room_type" class="form-control">
            <option value="">Select Room Type</option>
            <option value="ward">Ward</option>
            <option value="cabin">Cabin</option>
            <option value="ICU">ICU</option>
        </select>
    </div>
    <div class="col-sm-3">
        <span><i class="fa fa-hdd-o" style="color: green; font-size: 1.5em"></i> vacant</span> 
        &nbsp;
         <span><i class="fa fa-hdd-o" style="color: red; font-size: 1.5em"></i> occupied</span>
    </div>
</div>

<div class="row">
</div>
<br />

<div class="row">
    <?php foreach($rooms as $room){?>
    <?php
        $occupied_count = $this->db->where('room_number', $room['room_number'])
                                    ->where('discharge_timestamp >=', time())
                                    ->from('bed_allotment')
                                    ->count_all_results();
        $vacant_count = $room['bed_count'] - $occupied_count;
    ?>
    <div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white tile-white-primary" onclick="showAjaxModal('<?php echo site_url('modal/popup/bed_visual/'.$room['room_number']);?>');" class="btn btn-primary">
                <div class="num">Room <?php echo $room['room_number']; ?></div>
                <div>
                    <?php for($i = 0; $i < $vacant_count; $i++) {?>
                        <i class="fa fa-hdd-o" style="color: green; font-size: 1.5em"></i>
                    <?php }?>
                    <?php for($i2 = 0; $i2 < $occupied_count; $i2++) {?>
                        <i class="fa fa-hdd-o" style="color: red; font-size: 1.5em"></i>
                    <?php }?>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
</div>