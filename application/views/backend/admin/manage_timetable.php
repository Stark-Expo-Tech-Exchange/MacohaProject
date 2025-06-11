<!-- <form method="post" action="< ?php echo base_url('admin/timetable/create'); ?>">
    <select name="class_id">< ?php // fetch and display classes ?></select>
    <input type="text" name="subject" placeholder="Subject" required>
    <select name="teacher_id">< ?php // fetch and display teachers ?></select>
    <select name="day">
        <option>Monday</option><option>Tuesday</option><option>Wednesday</option>
        <option>Thursday</option><option>Friday</option>
    </select>
    <input type="time" name="start_time" required>
    <input type="time" name="end_time" required>
    <input type="text" name="room" placeholder="Room No." required>
    <button type="submit">Add Timetable Entry</button>
</form> -->

<div class="row">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title"><?php echo get_phrase('Generate Timetable'); ?></h3>
            <form method="post" action="<?php echo base_url(); ?>admin/timetable/create">

            <!-- to fetch a class name -->
                <div class="form-group">
                    <label><?php echo get_phrase('Class'); ?></label>
                    <select name="class_id" class="form-control" required>
                        <option value="">Select Class</option>
                        <?php 
                        $classes = $this->db->get('class')->result_array();
                        foreach($classes as $row): ?>
                            <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- to fetch subject -->
                <div class="form-group">
                    <label><?php echo get_phrase('Subject'); ?></label>
                    <select name="subject_id" class="form-control" required>
                    <option value="">Select Subject</option>
                    <?php
                    $subjects = $this->db->get('subject')->result_array();
                    foreach($subjects as $row): ?>
                    <opyion value="<?php echo $row['subject_id']; ?><?php echo $row['name']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <!-- to fetch a teacher -->
                <div class="form-group">
                    <label><?php echo get_phrase('Teacher'); ?></label>
                    <select name="teacher_id" class="form-control" required>
                        <option value="">Select Teacher</option>
                        <?php 
                        $teachers = $this->db->get('teacher')->result_array();
                        foreach($teachers as $row): ?>
                            <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('Day'); ?></label>
                    <select name="day" class="form-control" required>
                        <option>Monday</option><option>Tuesday</option>
                        <option>Wednesday</option><option>Thursday</option><option>Friday</option>
                    </select>
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('Start Time'); ?></label>
                    <input type="time" name="start_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('End Time'); ?></label>
                    <input type="time" name="end_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label><?php echo get_phrase('Room'); ?></label>
                    <input type="text" name="room" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Save Timetable Entry</button>
            </form>
        </div>

        <?php $entries = $this->db->get('timetable')->result_array(); ?>
<h4><?php echo get_phrase('Existing Timetable'); ?></h4>
<table class="table table-bordered">
    <thead>
        <tr><th>Class</th><th>Subject</th><th>Teacher</th><th>Day</th><th>Time</th><th>Room</th></tr>
    </thead>
    <tbody>
        <?php foreach($entries as $entry): ?>
        <tr>
            <td><?php echo $this->crud_model->get_type_name_by_id('class', $entry['class_id'], 'name'); ?></td>
            <td><?php echo $entry['subject']; ?></td>
            <td><?php echo $this->crud_model->get_type_name_by_id('teacher', $entry['teacher_id'], 'name'); ?></td>
            <td><?php echo $entry['day']; ?></td>
            <td><?php echo $entry['start_time'] . ' - ' . $entry['end_time']; ?></td>
            <td><?php echo $entry['room']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div>
</div>
