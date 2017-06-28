$(document).ready(function() 
    {
 
    $("#guest").on("click", function(){
    var datastring = "action=addguest&"+$("#form-search1").serialize();
    console.log(datastring);
        $.ajax({
            type        : 'POST', 
            url         : 'ajax.php',
            data        : datastring,
            success     : function(result){
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
            success     : function(result){
                                if (result.match(/success/gi)) {
                                alert("Data Submitted");
                                console.log("hello");
                              }else if (result.match(/failure/gi)) {
                                alert("Invalid Data");
                              }
                          }
            
        });
        });

    $("#sub1").on("click", function(){
    var datastring = "action=generatelink&"+$('#form-rsvp').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                              console.log("hello");
                              console.log(result);
                              $res=result.slice(1);
                              console.log($res);
                              if (window.confirm('Click "OK" to Confirm your RSVP.')) 
                                {
                                window.location='target.php?'+$res;
                                };  
                             
           }

        });     
        });

    $("#sub2").on("click", function(){
    var datastring = "action=addrequest&"+$('#form-request').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                            if (result.match(/success/gi)) {
                            console.log("hello");
                            
                           }
           }

        });     
        });

    $("#accept").on("click", function(){
    var datastring = "action=acceptrequest&"+$('#form-req').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                            if (result.match(/success/gi)) {
                            console.log("hello");
                            
                           }
           }

        });     
        });


    $("#decline").on("click", function(){
    var datastring = "action=declinerequest&"+$('#form-req').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                            if (result.match(/success/gi)) {
                            console.log("hello");
                            
                           }
           }

        });     
        });
});