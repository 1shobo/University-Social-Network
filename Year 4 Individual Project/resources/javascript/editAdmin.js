$(document).ready(function(){
   $(document).on('click','a[data-role=update]',function(){
//            alert($(this).data('id'));
       var id  = $(this).data('id');
       var studentID = $('#'+id).children('td[data-target=studentID]').text();
       var Name  = $('#'+id).children('td[data-target=Name]').text();
       var Password  = $('#'+id).children('td[data-target=Password]').text();
       var profilePicture  = $('#'+id).children('td[data-target=profilePicture]').text();
//               alert(profilePicture);
//               
       $('#studentID').val(studentID);
       $('#Name').val(Name);
       $('#Password').val(Password);
       $('#userId').val(id);
//               $('#profilePicture').val(profilePicture);
       $('#myModal').modal('toggle');
//               
   });

    $('#savebtn').click(function(){
        var id = $('#userId').val();
        var studentID = $('#studentID').val();
        var Name = $('#Name').val();
        var Password = $('#Password').val();
//                var profilePicture = $('#profilePicture');

        $.ajax({
            url : 'methods/editAdmin.php',
            method: 'POST',
            data : {studentID : studentID , Name : Name , Password : Password, id : id},
            success : function(response){
                console.log(response);
            }
        });
    });
});