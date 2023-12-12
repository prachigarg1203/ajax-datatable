<!DOCTYPE html>
<html>

<head>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables CSS and JS library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
    <?php
        //include "fetchData.php"?>
    <style>
    #modal {
        background: rgba(0, 0, 0, 0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        display: none;
    }

    #modal-form {
        background: #fff;
        width: 30%;
        position: relative;
        top: 20%;
        left: caic(50%-15%);
        padding: 15px;
        border-radius: 4px;
    }

    #close-btn {
        background: red;
        color: white;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        top: -15px;
        right: -15px;
        cursor: pointer;
    }
    </style>
</head>

<body>
<?php
session_start();
error_reporting(0);
$userprofile = $_SESSION['user_name'];
if($userprofile == true){

}else{
    header('location:Admin.php');
}
// echo "Welcome ".$_SESSION['user_name'];

?>
<a href="logout.php">LOGOUT</a>
    <div>
        <h2 class="text">All Records</h2>
    </div>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Record</button>
    </div>

    <div class="container">


        <div id="rcords_content">
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
               
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Fill This Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="#" id='fupForm' method="POST" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- <input type="hidden" name="id" class="member_id" id="member_id"> -->
                            <label>Image</label><br>
                            <input type="file" name="uploadfile" multiple><br />
                            <!-- <input type="submit" name="submit" value="Upload File"><br> -->
                            <label>First name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" />
                            <br />
                            <label>Last name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" />
                            <br />
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" />
                            <br />
                            <label>Gender</label>
                            <input type="text" name="gender" id="gender" class="form-control" />
                            <br />
                            <label>Country</label>
                            <input type="text" name="country" id="country" class="form-control" />
                            <br />
                            <label>Created</label>
                            <input type="date" name="created" id="created" class="form-control" />
                            <br />
                            <!-- <label>File Upload</label>
                            <input type="file" name="file" id="file" class="form-control"> -->
                            
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <table id="userDataList" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>File_name</th>
                <th>File_path</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>

    </table>
    <div id="modal">
        <div id="modal-form">
            <h2>
                Edit Form
            </h2>
            <table cellpadding="10px" width="100%">

            </table>
            <div id="close-btn">X</div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#userDataList').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "fetchData.php",
        "columnDefs": [{
            "orderable": false,
            "targets": 6
        }]
    });

    $('body').on('click','#submit', function(event) {
       //stop submit the form, we will post it manually.
       event.preventDefault();

        // Get form
        var form = $('#fupForm')[0];

        // Create an FormData object 
        var data = new FormData(form);
        console.log('email');
        console.log(data);
            // var id = $('#member_id').val();
                // var fname = $('#first_name').val();
                // var lname = $('#last_name').val();
                // var email = $('#email').val();
                // var gender = $('#gender').val();
                // var country = $('#country').val();
                // var created = $('#created').val();
                // var file = $('#file').val();

                // if (fname == '' || lname == '' || email == '' || gender == '' || country == '' || created ==
                //     '' || file =='') {
                //     $('#response').html('<span class="text-danger">All Fields are required</span>');
                // } else {
                    //  console.log(name);
            //  console.log(email);
            $.ajax({
                url: "insert.php",
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                data:  data,
                // {

                //     // first_name: fname,
                //         // last_name: lname,
                //         // email: email,
                //         // gender: gender,
                //         // country: country,
                //         // created: created,
                //     // file: file
                // }, //$('#submit_form').serialize(),  
                beforeSend: function() {
                    $('#response').html(
                        '<span class="text-info">Loading response...</span>');
                },
                success: function(data) {

                    $('form').trigger("reset");
                    $('#response').fadeIn().html(data);
                    setTimeout(function() {
                        $('#response').fadeOut("slow");
                    }, 5000);
                }
            });
        // }
    });

});
</script>
<!-- delete button -->
<script>
$(document).ready(function() {
    $(document).ready(function() {
        $(document).on("click", "delete-btn", function() {
            var stdId = $(this).data("id");
            // alert(stdId);
        });
    });
    let table = new DataTable('#datatables');
     $(document).on("click", ".delete-btn", function() {
        if (confirm("Do you really want to delete this record ?")) {

            var stdId = $(this).attr("id");
            console.log('astd' + stdId);
            var element = this;

            $.ajax({
                url: "ajax-delete.php",
                type: "POST",
                data: {
                    id: stdId
                },
                success: function(data) {
                    if (data == 1) {
                        $(element).closest("tr").fadeOut();
                        alert('successfully deleted');
                        location.reload();
                    } else {
                        $("#error-message").html("Can't Delete Record.").slideDown();
                        $("#success-message").slideUp();

                    }
                }
            });
        }
    });
});
</script>
<!-- edit buttton -->
<script>
$(document).on("click", ".edit-btn", function() {
    $("#modal").show();
    var stdId = $(this).attr("id");

    $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {
            id: stdId
        },
        success: function(data) {
            $("#modal-form table").html(data);
        }
    })
});

$("#close-btn").on("click", function() {
    $("#modal").hide();
});
$(document).on("click", "#edit-submit", function() {
    var stuId = $("#edit-id").val();
    var FName = $("#edit-fname").val();
    var LName = $("#edit-lname").val();
    var Email = $("#edit-email").val();
    var Gender = $("#edit-gender").val();
    var Country = $("#edit-country").val();
    var Created = $("#edit-created").val();
    var photo = $("#edit-file").val();
    console.log('stuId' + stuId, 'photo' +photo ,'FName' + FName, 'LName' + LName,'Email' + Email, 'Gender' + Gender, 'Country'+ Country, 'Created' + Created );
    $.ajax({
        url: "ajax-update-form.php",
        type: "POST",
        data: {
            id: stuId,
            first_name: FName,
            last_name: LName,
            email: Email,
            gender: Gender,
            country: Country,
            created: Created,
            photo: photo
        },
        success: function(data) {
            if (data == 1) {
                alert();
                $("#modal").hide();
            }
        }
    });
});
</script>