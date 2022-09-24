<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<!-- conn end -->


<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <img class="me-3" src="https://demo.dashboardpack.com/hospital-html/img/logo.png" alt="">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dash Board</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link " href="http://localhost/hospital/overview.php">Refresh</a>
                        </li>
                    </ul>
                    <form method="post" action="#" class="d-flex" role="search">
                        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="searchbtn" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- <div class="container">
        <div class="row">

            <img style="height: 350px;" src="https://image.jimcdn.com/app/cms/image/transf/none/path/s72bb96c6d0b72df5/backgroundarea/ia5f64f92d0bdbb3e/version/1503799579/image.png" alt="">
        </div>

    </div> -->
    <!-- conn start -->
    <?php
    // start conn
    include "./functions/conn.php";
    // get len of docs
    $docCount = $conn->query('select count(*) from doctors')->fetchColumn();
    // get len of ppl
    $pplCount = $conn->query('select count(*) from patients')->fetchColumn();



    ?>
    <!-- create the view php code here & render it -->
    <!-- start card -->
    <div class="container my-4">
        <div class="row ">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img style=" height:30px ;" class="mb-2" src="https://demo.dashboardpack.com/hospital-html/img/icon/cap.svg" alt="">

                        <h5 class="card-title"><?php echo $docCount; ?></h5>
                        <p class="card-text">Doctors available</p>
                        <a href="./adddoctors.php" class="btn btn-primary">Add New Doctors</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img style=" height:30px ;" class="mb-2" src="https://demo.dashboardpack.com/hospital-html/img/icon/man.svg" alt="">

                        <h5 class="card-title"><?php echo $pplCount; ?></h5>
                        <p class="card-text">Patients being served</p>
                        <a href="./addpatients.php" class="btn btn-primary">Add New Patients</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end card-->

    <!-- start table -->



    <div class="card-body px-2 container">

        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid" aria-describedby="example_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width:10px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 242.2px;" aria-label="Position: activate to sort column ascending">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100.2px;" aria-label="Age: activate to sort column ascending">Age</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300.2px;" aria-label="Office: activate to sort column ascending">Address</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 10.2px;" aria-label="Start date: activate to sort column ascending">Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->prepare(
                    "SELECT * FROM patients"
                );
                $stmt->execute();
                $patients = $stmt->fetchAll();
                foreach ($patients as $patient) {
                    if (isset($_POST["searchbtn"])) {
                        $search = $_POST["search"];

                        if ($search  == $patient["patient_id"] || $search  == $patient["patient_name"] || $search  == $patient["patient_address"] || $search  == $patient["patient_age"] || $search  == $patient["patient_doctor"]) { ?>



                            <tr role="row">
                                <td><?php echo $patient["patient_id"]; ?></td>
                                <td><?php echo $patient["patient_name"]; ?></td>
                                <td><?php echo $patient["patient_age"]; ?></td>
                                <td><?php echo $patient["patient_address"]; ?></td>
                                <td>
                                    <div class=" hstack gap-3">
                                        <a class="mx-auto" href="./viewandedit.php?p_id=<?php echo $patient["patient_id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                                            </svg>
                                        </a>
                                        <!-- <div class="bg-light border mx-auto"></div> -->
                                        <a class="mx-auto " href="./functions/del.php?p_id=<?php echo $patient["patient_id"]; ?>">
                                            <button style="filter: brightness(0) saturate(100%) invert(21%) sepia(92%) saturate(7325%) hue-rotate(359deg) brightness(115%) contrast(121%); ;" type="button" class="btn-close " aria-label="Close"></button>

                                        </a>
                                    </div>
                                </td>

                            </tr>
                        <?php    }
                    } else { ?>

                        <tr role="row">
                            <td><?php echo $patient["patient_id"]; ?></td>
                            <td><?php echo $patient["patient_name"]; ?></td>
                            <td><?php echo $patient["patient_age"]; ?></td>
                            <td><?php echo $patient["patient_address"]; ?></td>
                            <td>
                                <div class=" hstack gap-3">
                                    <a class="mx-auto" href="./viewandedit.php?p_id=<?php echo $patient["patient_id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                                        </svg>
                                    </a>
                                    <!-- <div class="bg-light border mx-auto"></div> -->
                                    <a class="mx-auto " href="./functions/del.php?p_id=<?php echo $patient["patient_id"]; ?>">
                                        <button style="filter: brightness(0) saturate(100%) invert(21%) sepia(92%) saturate(7325%) hue-rotate(359deg) brightness(115%) contrast(121%); ;" type="button" class="btn-close " aria-label="Close"></button>

                                    </a>
                                </div>
                            </td>

                        </tr>


                <?php }
                }
                ?>








            </tbody>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Name</th>
                    <th rowspan="1" colspan="1">Age</th>
                    <th rowspan="1" colspan="1">Address</th>
                    <th rowspan="1" colspan="1">Actions</th>

                </tr>
            </tfoot>
        </table>


    </div>



    <!-- end table -->

    <div class="toast-container position-fixed bottom-0 end-0 p-3 ">
        <div id="liveToast1" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto text-light">Al-Hekma</strong>


                <small class="text-white">Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Patient has been deleted successfully!
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script>
        let done = 0;
        done = <?php echo  $_REQUEST['done']; ?>;



        const toastLiveExample = document.getElementById('liveToast1')
        if (done == 1) {

            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()

        }
    </script>
</body>

</html>