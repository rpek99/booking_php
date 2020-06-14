<?php

$selectReservationsByUserId = "SELECT * FROM reservation WHERE user_id=0"; //TODO get user id of logged in user.
$selectRooms = "SELECT * FROM room";


$roomsResult = mysqli_query($conn, $selectRooms);
$rooms = array();
while($room = mysqli_fetch_array($roomsResult)){
    array_push($rooms, $room);
}

$result = mysqli_query($conn, $selectReservationsByUserId);
if ($result) {
    while ($booking = mysqli_fetch_array($result)) {
        $room_id = $booking['room_id'];
        foreach ($rooms as $room) {
            if ($room['room_id'] == $room_id) {
                $numOfDays = $booking['number_of_days'];
                $final_date = date('Y-m-d',strtotime($booking['created_at'].' + '.$numOfDays. 'day'));

                $today = date('Y-m-d');

                if ($final_date < $today){
                    array_push($previous_booked_rooms, $room);
                } else {
                    array_push($upcoming_booked_rooms, $room);

                }
            }
        }
    }

}



?>