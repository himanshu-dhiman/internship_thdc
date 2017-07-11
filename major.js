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
                                        ajaxConfirmTable();
                                        ajaxPendingTable();
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
                        if(result.match(/failure/gi)){
                          alert("Invalid Data..");
                        } else {
                              console.log("hello");
                              console.log(result);
                              $res=result.slice(1);
                              console.log($res);
                              if (window.confirm('Click "OK" to Confirm your RSVP.')) 
                                {
                                window.location='target.php?'+$res;
                                };  
                             }
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
                            alert('REQUEST SENT');
                            
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
                            ajaxConfirmTable();
                            ajaxPendingTable();
                            removerecord();
                            approval();
                           }
           }

        });     
        });

    function ajaxConfirmTable(){
      $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : {'action': 'confirmTable'},
            success     : function(result){
                            console.log("hello");
                            var guests=result;
                            console.log(guests);
                            constructConfirmGuestTable(guests);                            
                           }

        });     
    }


    function ajaxPendingTable(){
      $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : {'action': 'pendingTable'},
            success     : function(result){
                            console.log("hello");
                            var pguests=result;
                            console.log(pguests);
                            constructPendingGuestTable(pguests);
                            
                           }

        });     
    }


    function approval(){
      $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : {'action': 'approvedguest'},
            success     : function(result){
                            console.log("hello");
                            var guests=result;
                            console.log(guests);
                            constructApprovalTable(guests);                            
                           }

        });     
    }

      function removerecord(){
      $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : {'action': 'remove'},
            success     : function(result){
                            console.log("hello");
                            var rguests=result;
                            console.log(rguests);
                            constructRemoveRequest(rguests);
                            
                           }

        });     
    } 



    function constructConfirmGuestTable(allguests){

      var html='';
      console.log(allguests);
      var foo=JSON.parse(allguests)
      var length=foo.length;
      console.log(foo);
      for(var i=0;i<length;i++){
        var guest=foo[i];
        console.log(guest);
      var row_html='<tr>';
      row_html+='<td>'+guest['Name']+'</td>';
      row_html+='<td>'+guest['Email']+'</td>';
      row_html+="<td><span class='label label-success'>"+guest['Status']+"</span></td>";
      row_html+='</tr>';
      html+=row_html;

    }
    $('#invitation_table tbody').html(html);
    }


    function constructPendingGuestTable(allguests){

      var html='';
      console.log(allguests);
      var foo=JSON.parse(allguests)
      var length=foo.length;
      console.log(foo);
      for(var i=0;i<length;i++){
        var guest=foo[i];
        console.log(guest);
      var row_html='<tr>';
      row_html+='<td>'+guest['Name']+'</td>';
      row_html+='<td>'+guest['Email']+'</td>';
      row_html+="<td><span class='label label-primary'>"+guest['Status']+"</span></td>";
      row_html+='</tr>';
      html+=row_html;

    }
    $('#invitation_table tbody').append(html);
    }



      function constructRemoveRequest(request){

      var html='';
      var foo=JSON.parse(request)
      var length=foo.length;
      for(var i=0;i<length;i++){
        var guest=foo[i];
      var row_html='<tr>';
      row_html+='<td>'+guest['Name']+'</td>';
      row_html+='<td>'+guest['Email']+'</td>';
      row_html+='<td><button type="button" class="btn btn-success accept"  data-id='+guest['Guest_ID']+'name="accept">ACCEPT</button></td>';
      row_html+='<td><button type="button" class="btn btn-danger decline"  data-id='+guest['Guest_ID']+'name="decline">DECLINE</button></td>';
      row_html+='</tr>';
      html+=row_html;

    }
    $('#requests tbody').html(html);
    }


      function constructApprovalTable(allguests){

      var html='';
      console.log(allguests);
      var foo=JSON.parse(allguests)
      var length=foo.length;
      console.log(foo);
      for(var i=0;i<length;i++){
        var guest=foo[i];
        console.log(guest);
      var row_html='<tr>';
      row_html+='<td>'+guest['Name']+'</td>';
      row_html+='<td>'+guest['Email']+'</td>';
      row_html+="<td><span class='label label-warning'>"+guest['Status']+"</span></td>";
      row_html+='</tr>';
      html+=row_html;

    }
    $('#approved tbody').html(html);
    }


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
                          ajaxdeclinerequest();
                          removerecord();
                            
                           }
           }

        });     
        });

      function ajaxdeclinerequest(){
      $.ajax({
            type        : "POST", 
            url         : "ajax.php", 
            data        : {'action': 'declinetable'},
            success     : function(result){
                            console.log("hello");
                            var guests=result;
                            console.log(guests);
                            constructdeclineTable(guests);                            
                           }

        });     
    }


      function constructdeclineTable(allguests){

      var html='';
      console.log(allguests);
      var foo=JSON.parse(allguests)
      var length=foo.length;
      console.log(foo);
      for(var i=0;i<length;i++){
        var guest=foo[i];
        console.log(guest);
      var row_html='<tr>';
      row_html+='<td>'+guest['Name']+'</td>';
      row_html+='<td>'+guest['Email']+'</td>';
      row_html+="<td><span class='label label-danger'>"+guest['Status']+"</span></td>";
      row_html+='</tr>';
      html+=row_html;

    }
    $('#declined tbody').html(html);
    }



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
                            window.location='previous.php';
                            
                           }
           }

        });     
        });



});