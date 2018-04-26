
<?php
$room = $this->db->get_where('room', array('room_number' => $param2))->row();
// $patients = $this->db->where('room_number', $param2)
//                         ->where('discharge_timestamp <=', time())
//                         ->from('bed_allotment')
//                         ->get();


$patients = $this->db->get_where('bed_allotment', array('room_number' => $param2))
                    ->result_array();
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('room_' . $param2); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                 <div class="row">
                    <div class="col-sm-12">
                        <p>ROOM DETAILS</p>
                        <p>Room Number: <?php echo $room->room_number?></p>
                        <p>Room Type: <?php echo $room->type?></p>
                        <p>Floor: <?php echo $room->floor?></p>
                        <p>Bed Count: <?php echo $room->bed_count?></p>
                        <p>Description: <?php echo $room->description?></p>
                    </div>
                 </div>
                 <br/>
                 <div class="row">
                    <div class="col-sm-12">
                        <p>CURRENT PATIENTS</p>
                        <?php foreach($patients as $patient){?>
                                <?php $name = $this->db->get_where('patient' , array('patient_id' => $patient['patient_id'] ))->row()->name; ?>
                                <p>
                                    <i class="fa fa-user" style="font-size: 1.5em"></i> 
                                    &nbsp; 
                                    <?php echo $name; ?>
                                </p>      
                        <?php }?>
                    </div>
                 </div>
            </div>
            <!-- <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#12</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#13</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-aqua">
                                <div class="num">#14</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#15</div>
                            </div>
                        </a>
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#16</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#17</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#18</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#19</div>
                            </div>
                        </a>
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-aqua">
                                <div class="num">#20</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#21</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#23</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3">
                        <a href="#">
                            <div class="tile-stats tile-white-red">
                                <div class="num">#24</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div> -->

        </div>

    </div>
</div>