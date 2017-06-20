$(document).ready(function() 
    {
    $("#guest").on("click", function(){
    var datastring = "action=addguest&"+$("#form-search1").serialize();
    console.log(datastring);
        $.ajax({
            type        : 'POST', 
            url         : 'ajax.php',
            data        : datastring,
            dataType    : 'json',
            Success     : function(result){
                              console.log("hello");
                              if (result.match(/success/gi)) {
                                alert("Data Submitted");
                              }
                          }
                    
        });

    });  

    $("#sub").on("click", function(){
    var datastring = "action=addevent&"+$("#form-search").serialize();
    console.log(datastring);
        $.ajax({
            type        : 'POST', 
            url         : 'ajax.php', 
            data        : datastring,
            dataType    : 'json', 
            Success     : function(data){
                              console.log("hello");
                              alert("Data Submitted");
                          }
    
            
        });
        });

    $("#sub1").on("click", function(){
    var datastring = "action=eventManager&"+$('#form-rsvp').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", // define the type of HTTP verb we want to use (POST for our form)
            url         : "ajax.php", // the url where we want to POST
            data        : datastring,
            dataType    : "json", // what type of data do we expect back from the server
            Success     : function(data){
                              console.log("hello");
                              alert("Data Submitted");
                          }
      });       

 });     
});