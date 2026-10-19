<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zakutha tobacco estate</title>
    <link rel="stylesheet" href="work_progress.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-hospital"></i> ZAKUTHA TOBACOO ESTATE</h1>
       <!-- <div class="sidebar-menu">
            <ul>
                <li>Dashboard</li><li>Profile</li><li>Upload Report</li><li>Patient Report</li>
                <li>Download Report</li><li>Update Report</li><li>Complaints</li>
                <li>Pending Issues</li><li>Fixed Issues</li><li>Important Issues</li>
            </ul>
        </div>
        
        <div class="report-header">
            <h2>Patient ID: 11223344 &nbsp;|&nbsp; Report ID: 8</h2>
            <p><strong>Patient Name:</strong> Alex Sunny Alex &nbsp;|&nbsp; <strong>Age & Gender:</strong> 21 / male</p>
            <p><strong>Collected On:</strong> 25 Feb 2023, 05:25 PM &nbsp;|&nbsp; <strong>Report Status:</strong> Verified ✅</p>
        </div>
        -->
      <a 
        style="text-decoration-line: none; text-decoration-color: green;"
        href="timer.php">
        <input
           style="border: 2px solid grey; border-radius: 15px; background-color: green; padding:25px; color:white;"
        type="submit" name="ticket" value=" ADD TICKET">
      </a>
      <a 
        style="text-decoration-line: none; text-decoration-color: green;"
        href="ganyu.php">
        <input
           style="border: 2px solid grey; border-radius: 15px; background-color: green; padding:25px; color:white;"
        type="submit" name="ticket" value=" LEMBANI WAGANYU">
      </a>
<br>
        <table class="results-table">
            <thead>
                <th>TSIKU</th>
                <th>DZINA LA OGWIRA NTCHITO</th>
                <th>TIME IN(24HRS)</th>
                <th>TIME OUT (24HRS)</th>
                
                <th>MAOLA ONSE</th>
                <th>NTCHITO YAGWIRIDWA</th>
                <th>MTENGO PA OLA</th>
                <th>NDALAMA ZAPA TSIKU</th>
                <th>WORKER SIGNATURE</th>
                <th>EMPLOYER SIGNATURE</th>
            </thead>
            <tbody>

            <?php 

                 include ("connection.php");

                      $selection = "SELECT 
                      t.date, t.start_hour, t.start_minute, t.finish_hour,
                       t.finish_minute, t.total_time, t.rate,
                       t.total_amount, t.description, t.worker_signature, 
                       t.employer_signature, u.first_name, u.last_name 
                       FROM time t  JOIN users u ON t.user_id = u.user_id ORDER BY t.date DESC";

                      $run_this = mysqli_query ($connection, $selection);
                         
                         if (mysqli_num_rows ($run_this) > 0) {
                              
                              while ($result = mysqli_fetch_assoc ($run_this)){
                                 ?>
                             
               <tr>
                 <td>
                    <?php  echo "{$result ['date']}"; ?>
                 </td>
                 <td>
                    <?php echo "{$result ['first_name']}  {$result ['last_name']}";  ?>
                 </td>
                 <td>
                    <?php echo "{$result ['start_hour']}:{$result ['start_minute']}:00";   ?>
                 </td>
                 <td>
                    <?php echo "{$result ['finish_hour']}:{$result ['finish_hour']}:00";   ?>
                 </td>
                  <td>
                    <?php  echo "{$result ['total_time']}Hours"; ?>
                  </td>
                  <td>
                     <?php echo "{$result ['description']}";   ?>
                  </td>
                  <td>
                    <?php  echo "MWK{$result ['rate']}/Hr"; ?>
                  </td>
                  <td>
                    <?php  echo "MWK{$result ['total_amount']}"; ?>
                  </td>
                  <td>
                     <?php  echo "{$result ['worker_signature']}"; ?>
                  </td>
                  <td>
                     <?php  echo "{$result ['employer_signature']}"; ?>
                  </td>
               </tr>
               <?php
                 }
                         }


             ?>
               <!-- <tr>
                 <td>
                    2026-05-30
                 </td>
                 <td>
                    bornface kalumba
                 </td>
                 <td>
                    06:00:00
                 </td>
                 <td>
                    18:00:00
                 </td>
                  <td>
                    12
                  </td>
                  <td>
                    MWK520/hr
                  </td>
                  <td>
                    MWK6 240.00
                  </td>
                  <td>has worked </td>
               </tr> ---->
               
            </tbody>
        </table>
        <!--<div class="notes"><strong>Interpretation Notes:</strong> WBC:756, RBC:456, Platelets:456, Hb:456, HBsAg: Not applicable, Blood Group: A+, Fasting Sugar:546, Uric Acid:546</div>-->
    </div>
</body>
</html>