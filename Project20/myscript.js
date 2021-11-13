$(document).ready(function(){
    $('#upload_csv').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url:"import.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success: function(data){
                if(data=='Error1')
                {
                    alert("Invalid File");
                }
                else if (data=="Error2")
                {
                    alert("Please Select File");
                }
                else 
                {
                    $('#employee_table').html(data);
                }
            }
        })
    })
})