 <!--row -->
 <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('student');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('student');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- view parentz by uncommenting here -->
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4>< ?php echo $this->db->count_all_results('parent');?></h4>
                                    <span class="text-muted">< ?php echo get_phrase('parent');?></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('teacher');?></h4>
                                    <span class="text-muted"><?php echo get_phrase('all_teachers');?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-inverse"></i>
                                <div class="bodystate">
                                    <h4>
                                    <?php 

                                    $check_daily_attendance = array('date' => date('Y-m-d'), 'status' => '1');
                                    $get_attendance_information = $this->db->get_where('attendance', $check_daily_attendance);
                                    $display_attendance_here = $get_attendance_information->num_rows();
                                    echo $display_attendance_here;
                                    ?>
                                    
                                    </h4>
                                    <span class="text-muted"><?php echo get_phrase('Attendance');?></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    

            </div>
                <!--/row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h1>STUDENTS' ATTENDANCE STATUS</h1>
                            <div class="stats-row">


                                <!-- Styles -->
                                <style>
                                    h1{
                                        text-align: center;
                                    }
                                #chartdiv1 {
                                width: 100%;
                                height: 500px;
                                }

                                .amcharts-chart-div a{
                                    display:none !important;
                                }	

                                </style>

                                <!-- Chart code -->
                                <script>
                                am4core.ready(function() {

                                // Themes begin
                                am4core.useTheme(am4themes_animated);
                                // Themes end

                                // Create chart instance
                                var chart = am4core.create("chartdiv1", am4charts.PieChart);

                                // Add data
                                chart.data = [
                    
                    <?php $selects = $this->db->get('attendance')->result_array(); //$this->crud_model->get_invoice_info();
                            foreach ($selects as $key => $select):?>

                                {
                                "country": "<?php echo $this->crud_model->get_type_name_by_id('student', $select['student_id']);?>",
                                "litres": <?= $this->db->get_where('student', array('student_id' => $select['student_id']))->num_rows();?>
                                }, 
                    <?php endforeach;?>
                                
                                ];

                                // Add and configure Series
                                var pieSeries = chart.series.push(new am4charts.PieSeries());
                                pieSeries.dataFields.value = "litres";
                                pieSeries.dataFields.category = "country";
                                pieSeries.innerRadius = am4core.percent(50);
                                pieSeries.ticks.template.disabled = true;
                                pieSeries.labels.template.disabled = true;

                                var rgm = new am4core.RadialGradientModifier();
                                rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, - 0.5);
                                pieSeries.slices.template.fillModifier = rgm;
                                pieSeries.slices.template.strokeModifier = rgm;
                                pieSeries.slices.template.strokeOpacity = 0.4;
                                pieSeries.slices.template.strokeWidth = 0;

                                chart.legend = new am4charts.Legend();
                                chart.legend.position = "right";

                                }); // end am4core.ready()
                                </script>

                                <!-- HTML -->
                                <div id="chartdiv1"></div>

                               
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
                <!-- /.row -->
               
                <div class="row">
                    <!-- <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">< ?php echo get_phrase('Teachers');?></h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                            < ?php $get_teacher_from_model = $this->crud_model->list_all_teacher_and_order_with_teacher_id();
                                    foreach ($get_teacher_from_model as $key => $teacher):?>
                                            <td><img src="< ?php echo $teacher['face_file'];?>" class="img-circle" width="40px"></td>
                                            <td>< ?php echo $teacher['name'];?></td>
                                            <td>< ?php echo $teacher['email'];?></td>
                                            <td>< ?php echo $teacher['phone'];?></td>
                                        </tr>
                                    < ?php endforeach;?>
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('Registered Students');?></h3>
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                            <?php $get_student_from_model = $this->crud_model->list_all_student_and_order_with_student_id();
                                    foreach ($get_student_from_model as $key => $student):?>
                                            <td><img src="<?php echo $student['face_file'];?>" class="img-circle" width="40px"></td>
                                            <td><?php echo $student['name'];?></td>
                                            <td><?php echo $student['email'];?></td>
                                            <td><?php echo $student['phone'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->