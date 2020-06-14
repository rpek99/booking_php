
$(document).ready(function(e) {
    var data = { "user_id": 0 };  //TODO get user id after login

    $.ajax({
        data: data,
        type: "post",
        url: "backend/get_user.php",
        success: function(dataResult){
            var userInformation = JSON.parse(dataResult);
            $("#user-id").text(userInformation.id);
            $("#user-name").text(userInformation.name);
            $("#user-surname").text(userInformation.surname);
            $("#user-phone").text(userInformation.phone);
            $("#user-email").text(userInformation.email);
        }
    });

    $.ajax({
        data: data,
        type: "post",
        url: "backend/get_bookings.php",
        success: function(dataResult){
            var bookings = JSON.parse(dataResult);
            console.log(bookings);
        }
    });
}); 
 
$(document).on('click','.update',function(e) {
    var id = $("#user-id").text();
    var name = $("#user-name").text();
    var surname = $("#user-surname").text();
    var phone = $("#user-phone").text();
    var email = $("#user-email").text();

    $('#id_u').val(id);
    $('#name_u').val(name);
    $('#surname_u').val(surname);
    $('#phone_u').val(phone);
    $('#email_u').val(email);
});
//<!-- Update -->
$(document).on('click','#update',function(e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "backend/update_user.php",
        success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#editEmployeeModal').modal('hide');
                    alert('Data updated successfully !'); 
                    location.reload();						
                }
                else if(dataResult.statusCode==201){
                   alert(dataResult);
                }
        }
    });
});

