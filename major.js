$(document).ready(function() 
    {

        
            $("#guest").on("click", function(){
            var datastring = "action=addguest&"+$('#form-search1').serialize();
            console.log(datastring);
                $.ajax({
                    type        : 'POST', 
                    url         : 'ajax.php',
                    data        : datastring,
                    success     : function(result){
                                      console.log("hello");
                                      if (result.match(/success/gi)) {
                                        window.location='adminhome.php';
                                      }else if (result.match(/failure/gi)) {
                                    alert("Invalid Data");
                                  }
                                  }
                            
                });
            });  




    $("#manage").on("click", function(){
        var datastring = "action=eventManager&"+$("#form-manage").serialize();
        console.log(datastring);
            $.ajax({
                type        : 'POST', 
                url         : 'ajax.php',
                data        : datastring,
                success     : function(result){
                                  console.log("hello");
                                  if (result.match(/success/gi)) {
                                    window.location='index.php';
                                  } else if (result.match(/failure/gi)) {
                                    alert("Invalid Data");
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
                                window.location='adminhome.php';
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
                            
                           }else if (result.match(/failure/gi)) {
                                    alert("Invalid Data");
                                  }
           }

        });     
        });

    $(".accept").on("click", function(){
      var key=this.dataset.id;
      console.log(key);
    var datastring = `action=acceptrequest&id=${key}&`+$('#form-req').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                            if (result.match(/success/gi)) {
                            console.log("hello");
                           // window.location='adminhome.php';
                            
                           }
           }

        });     
        });


    $(".decline").on("click", function(){
    var key=this.dataset.id;
    console.log(key);
    var datastring = `action=declinerequest&id=${key}&`+$('#form-req').serialize();
    console.log(datastring);
        $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                            if (result.match(/success/gi)) {
                            console.log("hello");
                           window.location='adminhome.php';
                            
                           }
           }

        });     
        });

     $("#sub3").on("click", function(){
            var datastring = "action=login&"+$('#form-login').serialize();
            console.log(datastring);
                $.ajax({
                    type        : 'POST', 
                    url         : 'ajax.php',
                    data        : datastring,
                    success     : function(result){
                                      console.log("hello");
                                      if (result.match(/success/gi)) {
                                        window.location='adminhome.php';
                                      }else if (result.match(/failure/gi)) {
                                    alert("Wrong Credentials");
                                    }
                                  }
                            
                });
            });  


      $(".delete").on("click", function(){
      var key=this.dataset.id;
      console.log(key);
      var datastring = `action=deleteevent&id=${key}`;
      console.log(datastring);
          $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : datastring,
            success     : function(result){
                            if (result.match(/success/gi)) {
                            console.log("hello");
                           window.location='adminhome.php';
                            
                           }
           }

        });     
        });



});