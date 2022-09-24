<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>


<body>
    <?php include "header.php"; ?>
    <?php
    // start conn
    include "./functions/conn.php";
    // get docs name for the input 
    $stmt = $conn->prepare("SELECT * FROM doctors");
    $stmt->execute();
    $result = $stmt->fetchAll();




    ?>

    <!-- this page has a form & has a button the get me back to the main page -->
    <form class="container border border-info mt-5 rounded" method="POST" action="./functions/add.doc.php">
        <span class="fs-1">Add Doctor:</span>
        <div class="input-group my-3">

            <span class="input-group-text">Full Name</span>
            <input required placeholder="First name" name="first_name" type="text" class="form-control">
            <input required placeholder="Second name" name="second_name" type="text" aria-label="Second name" class="form-control">

        </div>
        <div class="input-group my-3">
            <span class="input-group-text">Age</span>
            <input required placeholder="Enter Age" name="age" type="number" class="form-control">
        </div>
        <div class="input-group my-3">
            <span class="input-group-text">Address</span>
            <input required placeholder="Enter Address" name="address" type="text" class="form-control">

            <div class="input-group my-3">
                <span class="input-group-text">Specialty</span>
                <input required type="text" name="specialty" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Add doctor specialty...">
            </div>

            <div class="w-100 hstack gap-3">
                <div class="bg-light border"></div>
                <div class="bg-light border ms-auto"></div>
                <a href="./overview.php">
                    <button type="button" class="btn btn-outline-danger rounded">Cancel</button>
                </a>
                <div class="vr"></div>

                <button name="submit" type="submit" class="btn btn-outline-success rounded">Save</button>


            </div>

    </form>








    <div class="toast-container position-fixed bottom-0 end-0 p-3 ">
        <div id="liveToast" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto text-light">Al-Hekma</strong>


                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Doctor has been added successfully!
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script>
        let done = 0;
        done = <?php echo  $_REQUEST['done']; ?>;



        const toastLiveExample = document.getElementById('liveToast')
        if (done == 1) {

            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()

        }
    </script>

</body>

</html>