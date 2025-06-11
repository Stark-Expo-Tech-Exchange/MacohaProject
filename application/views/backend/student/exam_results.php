<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Exam</th>
            <th>Mark</th>
            <th>Comment</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $student_id = $this->session->userdata('student_id');
        $this->db->where('student_id', $student_id);
        $marks = $this->db->get('mark')->result_array();
        $count = 1;
        foreach ($marks as $row):
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $this->crud_model->get_subject_name_by_id($row['subject_id']); ?></td>
            <td><?php echo $row['exam_name']; ?></td>
            <td><?php echo $row['mark_obtained']; ?></td>
            <td><?php echo $row['comment']; ?></td>
            <td><?php echo $row['year']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
