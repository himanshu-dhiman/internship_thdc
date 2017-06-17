$(document).ready(function() 
    {
    $("#sub").on("click", function(){
    var datastring = $("#form-search").serialize();
    console.log(datastring);
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'trial.php', // the url where we want to POST
            data        : datastring,
            dataType    : 'json', // what type of data do we expect back from the server
            Success     : function(data){
                              console.log("hello");
                          },
            error       : function(data){
                              console.log("error");
                              console.log(data);
                              

            }
        })
        alert("Data Submitted");


    });  

    $("#guest").on("click", function(){
    var datastring = $("#form-search1").serialize();
    console.log(datastring);
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'addguest.php', // the url where we want to POST
            data        : datastring,
            dataType    : 'json', // what type of data do we expect back from the server
            Success     : function(data){
                              console.log("hello");
                          },
            error       : function(data){
                              console.log("error");
                              console.log(data);
                              

            }
        })
        alert("Data Submitted");
      });

    $("#sub1").on("click", function(){
    var datastring = $("#form-rsvp").serialize();
    console.log(datastring);
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'rsvp.php', // the url where we want to POST
            data        : datastring,
            dataType    : 'json', // what type of data do we expect back from the server
            Success     : function(data){
                              console.log("hello");
                          },
            error       : function(data){
                              console.log("error");
                              console.log(data);
                              

            }
        })
      });

 });     

 