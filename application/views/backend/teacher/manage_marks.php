<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Assign Exam Marks</h3>
            <form method="post" action="<?php echo base_url();?>index.php?teacher/manage_marks/create">
                <div class="form-group">
                    <label>Class</label>
                    <select name="class_id" class="form-control" required>
                        <option value="">Select a class</option>
                        <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach ($classes as $row): ?>
                            <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject_id" class="form-control" required>
                        <option value="">Select a subject</option>
                        <?php 
                            $subjects = $this->db->get('subject')->result_array();
                            foreach ($subjects as $row): ?>
                            <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Student</label>
                    <select name="student_id" class="form-control" required>
                        <option value="">Select a student</option>
                        <?php 
                            $students = $this->db->get('student')->result_array();
                            foreach ($students as $row): ?>
                            <option value="<?php echo $row['student_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Exam Name</label>
                    <input type="text" name="exam_name" class="form-control" placeholder="e.g. Midterm, Final" required>
                </div>

                <div class="form-group">
                    <label>Score</label>
                    <input type="number" step="0.1" name="mark_obtained" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Comment (Optional)</label>
                    <textarea name="comment" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Academic Year</label>
                    <input type="text" name="year" class="form-control" value="<?php echo $running_year; ?>" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Submit Mark</button>
            </form>
        </div>
    </div>
</div>

<!-- 
< ?php
$teacher_id = $this->session->userdata('teacher_id');
$subjects = $this->db->get_where('subject', array('teacher_id' => $teacher_id))->result_array();
?>
<form method="post" action="< ?php echo base_url(); ?>index.php?teacher/manage_marks/create">
    < !-- Class and Subject selection -
    <div class="form-group">
        <label>Subject</label>
        <select class="form-control" name="subject_id" required>
            <option value="">Select</option>
            < ?php foreach($subjects as $subject): ?>
                <option value="< ?php echo $subject['subject_id']; ?>">
                    < ?php echo $subject['name']; ?>
                </option>
            < ?php endforeach; ?>
        </select>
    </div>
    < !-- other fields: class, student, mark, etc. -
</form>
 -->
