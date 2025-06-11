<?php 
$student_id = $this->session->userdata('student_id');
$student = $this->db->get_where('student', ['student_id' => $student_id])->row();
$class_id = $student->class_id;

$timetable = $this->db->get_where('timetable', ['class_id' => $class_id])->result_array();
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Day</th><th>Subject</th><th>Teacher</th><th>Time</th><th>Room</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($timetable as $row): ?>
        <tr>
            <td><?php echo $row['day']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $this->crud_model->get_type_name_by_id('teacher', $row['teacher_id'], 'name'); ?></td>
            <td><?php echo $row['start_time'] . ' - ' . $row['end_time']; ?></td>
            <td><?php echo $row['room']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
