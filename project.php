<?php
include 'backend/database.php';

$images_dirname = "images/";

$previous_booked_rooms = array();
$upcoming_booked_rooms = array();

include 'backend/get_bookings.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/my-account.css">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>

</head>

<body>
<?php

?>

    <nav>
        <div class="logo"><a href="home.html"><img src="../img/logo.png" alt="logo"></a></div>
        <ul class="menu-area">
            <li><a href="home.html">Home</a></li>
            <li><a href="rooms.html">Rooms</a></li>
            <li><a href="my-account.html">My Account</a></li>
            <li><a href="../index.html">Exit</a></li>
        </ul>
    </nav>

    <div class="row">
        <p id="success"></p>
        <div class="side">
            <h2 style="text-align: center;">
                <font color="white">User Profile</font>
            </h2>
            <div id="backroundprof" class="fakeimg" style="height:400px;">
                    <br>
                    <span id="user-id" style="display: none"></span>
                    <span style="font-family: Arial Black;">Name :</span> <span style="font-family: Arial;"><span id="user-name"></span></span>
                    <br><br>
                    <span style="font-family: Arial Black;">Surname :</span> <span style="font-family: Arial;"><span id="user-surname"></span></span>
                    <br><br>
                    <span style="font-family: Arial Black;">Phone :</span> <span style="font-family: Arial;"><span id="user-phone"></span></span>
                    <br><br>
                    <span style="font-family: Arial Black;">E-Mail :</span> <span style="font-family: Arial;"><span id="user-email"></span></span>



                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">

                       <i style="margin: 140px 110px;" class="material-icons update" data-toggle="tooltip" title="Edit">&#xe003;</i>
                       
                    </a>

            </div>


        </div>

        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="update_form">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_u" name="id" class="form-control" required>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name_u" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" id="surname_u" name="surname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PHONE</label>
                                <input type="phone" id="phone_u" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" id="email_u" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="2" name="type">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-info" id="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="main">
            <h1>My Reservations</h1>
            <h5 class="border">Upcoming Reservations</h5>

            <div class="fakeimg" style="height:200px;">
                <?php

                foreach ($upcoming_booked_rooms as $booked_room){

                    $image = glob($images_dirname.$booked_room['image']);
                    echo '<img class="pctborder" src="'.$image[0].'" width="250px" height="160px"/>';

                    echo '<div class="paragraph">';

                    echo '<b>'.$booked_room['name'].'</b>';
                    echo '<p>'.$booked_room['description'].'</p>';

                    echo '<hr class="hrstyle" align="left" width="65%">';
                    echo '<svg class="bi bi-geo-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>';

                    echo $booked_room['location'];
                    echo '<hr class="hrstyle" align="left" width="65%">';

                    echo '</div>';

                    echo '<input type="button" value="Cancel" class="button buttonpos" onclick="ConfirmDelete()">';
                    echo '<input type="button" value="Update" class="button buttonloc" onclick="updateReservation()">';
                }

                ?>

            </div>
            <br>

            <h5 id="bordercolor" class="border">Previous Reservations</h5>

            <div class="fakeimg" style="height:200px;">
                <?php

                foreach ($previous_booked_rooms as $booked_room){

                    $image = glob($images_dirname."/".$booked_room['image']);
                    echo '<img class="pctborder" src="'.$image[0].'" width="250px" height="160px"/>';


                //echo '<img class="pctborder" src="https://alkazar.com.tr/wp-content/uploads/ic-ortam-hava-kalitesi-0.png" width="250px" height="160px">';

                echo '<div class="paragraph">';

                    echo '<b>'.$booked_room['name'].'</b>';
                    echo '<p>'.$booked_room['description'].'</p>';

                    echo '<hr class="hrstyle" align="left" width="65%">';
                    echo '<svg class="bi bi-geo-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>';

                    echo $booked_room['location'];
                    echo '<hr class="hrstyle" align="left" width="65%">';

                echo '</div>';

                echo '<input type="button" value="Reserve Again" class="button bttnspcl" onclick="resrveAgain()">';
  }

                ?>
               <!-- <textarea style="margin-left: -180px;" class="txtarea" rows="2" cols="70" name="comment" form="usrform"> Comment...</textarea> -->
                     
            </div>
            <br>
            </div>
        </div>
    </div>

    <div class="footer">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <P style="font-family: Impact, Charcoal, sans-serif;">
            <font size="5">FOLLOW US ON</font>
        </P>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-instagram"></a>

    </div>

    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

        function updateReservation() {
            alert("Your reservation has been updated");
        }

        function resrveAgain() {
            alert("Congratulations, your reservation has been completed.");
        }
    </script>

</body>

</html>