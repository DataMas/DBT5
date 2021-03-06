<?php
require_once "./connect.php";
require_once "./auth.php";

if($access_level == 2) {
  header("Location: ./login.php");
}

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <!-- Cache -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <!-- Icons-->
  <link href="./css/icons/simple-line-icons.css" rel="stylesheet"/>
  <link href="./css/icons/font-awesome.min.css" rel="stylesheet"/>

  <!-- Styles -->
  <link href="./css/style.css" rel="stylesheet"/>

  <title>Treatment</title>
</head>
<body class="app header-fixed sidebar-fixed">
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="./index.php">
      <img class="navbar-brand-full" src="img/logo.svg" width="89" height="25" alt="Clinic Logo">
      <img class="navbar-brand-minimized" src="img/sygnet.svg" width="30" height="30" alt="Clinic Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
  <?php if ($access_level == 1) {
    // Navbar for doctors
  ?>
    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="./doctors_patients.php">Dashboard</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./equipment.php">Equipment</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./available_medications.php">Medications</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./treat.php">Treatments</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./available_doctors.php">Doctors</a>
      </li>
    </ul>
  <?php } else if ($access_level == 2) {
    // Navbar for nurses
  ?>
    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="./nurses_patients.php">Dashboard</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./nurse_edit_rooms.php">Rooms</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./available_medications.php">Medications</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./add_patient.php">New Patient</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="./available_doctors.php">Doctors</a>
      </li>
    </ul>
  <?php } else {
          // If for some reason another access level is found
            header("Location: ./logout.php");
        } ?>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src=<?php echo ($gender == 'M') ? "img/avatar_m.png" : "img/avatar_f.png";?> alt="Profile">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item disabled" href="#">
            <i class="fa fa-user"></i> Welcome <?php echo $name; ?>
          </a>
          <a class="dropdown-item" href="./logout.php">
            <i class="fa fa-lock"></i> Logout</a>
        </div>
      </li>
    </ul>
  </header>

  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
        <?php if ($access_level == 1) {
          // Sidebar for doctors
        ?>
          <li class="nav-item">
            <a class="nav-link" href="./doctors_patients.php">
              <i class="nav-icon fa fa-procedures"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./equipment.php">
              <i class="nav-icon fa fa-x-ray"></i> Equipment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./available_medications.php">
              <i class="nav-icon fa fa-briefcase-medical"></i> Medications
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./treat.php">
              <i class="nav-icon fa fa-stethoscope"></i> Treatments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./available_doctors.php">
              <i class="nav-icon fa fa-user-md"></i> Doctors
            </a>
          </li>
        <?php } else if ($access_level == 2) {
          // Sidebar for nurses
        ?>
          <li class="nav-item">
            <a class="nav-link" href="./nurses_patients.php">
              <i class="nav-icon fa fa-procedures"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./nurse_edit_rooms.php">
              <i class="nav-icon fa fa-hospital"></i> Rooms
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./available_medications.php">
              <i class="nav-icon fa fa-briefcase-medical"></i> Medications
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add_patient.php">
              <i class="nav-icon fa fa-ambulance"></i> New Patient
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./available_doctors.php">
              <i class="nav-icon fa fa-user-md"></i> Doctors
            </a>
          </li>
        <?php } else {
          // If for some reason another access level is found
                  header("Location: ./logout.php");
              } ?>
        </ul>
      </nav>
    </div>
    <br>
    <main class="main">
      <ol class="breadcrumb" style="padding: 0; border: none;">
      </ol>

      <div class="container-fluid">
        <div id="routerOutlet" class="animated-fadeIn">

          <div class="card">
              <div class="card-header">Patient History</div>
              <div class="card-body">
                <form action="./treat.php" method="POST" class="needs-validation" novalidate>
                  <div class="form-group">
                    <label for="selectPatient">Select Patient</label>
                    <select onchange="this.form.submit()" class="custom-select" name="patient" id="selectPatient" required>
                      <option value="">No Selection</option>
                      <?php
                        $query = $db->prepare("SELECT `name`, `surname`, `patient_code`, `gender`, `admission_reason` FROM `patients` WHERE `patient_clinic_id`=:clinic AND `discharge_date` IS NULL");
                        $query->execute(['clinic' => $clinic_id]);
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $index=>$row) {
                          if (isset($_POST['patient']) && $_POST['patient'] == $row['patient_code']) {
                            echo '<option value="' . $row['patient_code'] . '" selected="selected">' . $row['name'] . ' ' . $row['surname'] . '</option>';
                          } else {
                            echo '<option value="' . $row['patient_code'] . '">' . $row['name'] . ' ' . $row['surname'] . '</option>';
                          }
                        }
                      ?>
                    </select>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      You must select something!
                    </div>
                  </div>
                </form>
                <?php if (isset($_POST['patient'])) {
                  echo "Patient Code: " . $_POST['patient']; }?>
                <table class="table table-responsive-sm">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Diagnosis</th>
                      <th>Treatment</th>
                      <th>Medication</th>
                    </tr>
                  </thead>
                  <tbody id="history">
                    <?php
                      if (isset($_POST['patient'])){
                        try{
                          $dbconnect = new Connection();
                          $db = $dbconnect->openConnection();
                        }catch(PDOException $error){
                          echo "<p id='connerror'>A connection error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
                          $dbconnect->closeConnection();
                        }

                        $query = $db->prepare("SELECT `date`, `diagnosis`, `treatment`, `treating_medication_name` FROM `treats` WHERE `treated_patient_code`= :patient ORDER BY `date` ASC");
                				$query->execute(['patient' => $_POST['patient']]);
                				$result2 = $query->fetchAll(PDO::FETCH_ASSOC);

                				foreach ($result2 as $index=>$row2) {
                					echo "<tr>" .
                					"<td>" . $row2['date'] . "</td>" .
                					"<td>" . $row2['diagnosis'] . "</td>" .
                          "<td>" . $row2['treatment'] . "</td>" .
                          "<td>" . $row2['treating_medication_name'] . "</td>" . "</tr>";
                				}
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-0">Treat your patient</h4>
                <br>
                <form action="./treating.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" name="patient_code" value="<?php echo $_POST['patient']; ?>">
                  <div class="form-group">
                    <label for="diagnosis">Write your diagnosis</label>
                    <textarea class="form-control"  name="diagnosis" id="diagnosis" minlength="20" required></textarea>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      You need to provide a valid diagnosis.
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="treatment">Write the steps you will do in order to treat the patient</label>
                    <textarea class="form-control" type="textarea" name="treatment" id="treatment" minlength="20" required></textarea>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      You need to provide your suggested treatment.
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="selectMedicine">Select Medicine</label>
                    <select class="custom-select" name="medicine" id="selectMedicine">
                      <option value="">No Selection</option>
                      <?php
                        $query = $db->prepare("SELECT `name` FROM `medications` WHERE `clinic_id`= :clinic");
                        $query->execute(['clinic' => $clinic_id]);
                        $result3 = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result3 as $index=>$row3) {
                          echo '<option value="' . $row3['name'] . '">' . $row3['name'] . '</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Confirm Treatment</button>
                </form>
              </div>
            </div>

        </div>
      </div>
    </main>
  </div>

  <footer class="app-footer">
    <div>
      <a>Databases Team 5</a>
      <span>&copy; 2019-2020</span>
    </div>
    <div class="ml-auto">
      <span>Powered by</span>
      <a href="https://coreui.io">CoreUI</a>
    </div>
  </footer>

  <!-- Bootstrap and necessary plugins-->
  <script src="./js/dependencies/jquery.min.js"></script>
  <script src="./js/dependencies/bootstrap.min.js"></script>
  <script src="./js/dependencies/coreui.min.js"></script>

  <!-- Validation script -->
  <script src="./js/validation.js"></script>

</body>
</html>
