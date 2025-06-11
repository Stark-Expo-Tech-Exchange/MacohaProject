<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title"><?php echo get_phrase('Exam Results'); ?></h3>

            <?php
                $exams = $this->db->get('exam')->result_array();
                foreach ($exams as $exam):
                    echo "<h4>" . $exam['name'] . " (" . $exam['term'] . ")</h4>";
                    $this->db->where('student_id', $student_id);
                    $this->db->where('exam_id', $exam['exam_id']);
                    $this->db->where('year', $running_year);
                    $results = $this->db->get('mark')->result_array();
            ?>

            <?php if (count($results) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo get_phrase('Subject'); ?></th>
                        <th><?php echo get_phrase('Mark Obtained'); ?></th>
                        <th><?php echo get_phrase('Out of'); ?></th>
                        <th><?php echo get_phrase('Grade'); ?></th>
                        <th><?php echo get_phrase('Comment'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td>
                                <?php echo $this->crud_model->get_subject_name_by_id($row['subject_id']); ?>
                            </td>
                            <td><?php echo $row['mark_obtained']; ?></td>
                            <td><?php echo $row['mark_total']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p><?php echo get_phrase('No results found for this exam.'); ?></p>
            <?php endif; ?>
            <hr>
            <?php endforeach; ?>
        </div>
    </div>
</div>
