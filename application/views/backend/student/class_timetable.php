<!-- $query = "SELECT * FROM class_timetable WHERE class_name = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$class_name]);
$timetable = $stmt->fetchAll();

foreach ($timetable as $row) {
    echo "<tr>
        <td>{$row['day_of_week']}</td>
        <td>{$row['subject_name']}</td>
        <td>{$row['start_time']} - {$row['end_time']}</td>
        <td>{$row['teacher_name']}</td>
    </tr>";
} -->

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title"><?php echo get_phrase('Class Timetable'); ?></h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo get_phrase('Day'); ?></th>
                        <th><?php echo get_phrase('Subject'); ?></th>
                        <th><?php echo get_phrase('Start Time'); ?></th>
                        <th><?php echo get_phrase('End Time'); ?></th>
                        <th><?php echo get_phrase('Teacher'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $student_class = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row()->class;
                $timetable = $this->db->get_where('class_timetable', array('class_name' => $student_class))->result_array();
                foreach ($timetable as $row): ?>
                    <tr>
                        <td><?php echo $row['day_of_week']; ?></td>
                        <td><?php echo $row['subject_name']; ?></td>
                        <td><?php echo $row['start_time']; ?></td>
                        <td><?php echo $row['end_time']; ?></td>
                        <td><?php echo $row['teacher_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
