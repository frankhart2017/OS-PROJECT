<?php include "./includes/header.php";?>

<main>
<!-- Section: Stats -->
<section class="section section-stats blue center">
    <div class="container">
            <div class="card">
                <div class="card-content">
                 <span class="card-title center"><b>Page Replacements Alogrithms</b></span>
              <form id="fooo" action="#">
                <div class="row">
                    <div class="col s12 ">
                    <div class="input-field col s12">
                        <select>
                          <option  value="" disabled selected>Choose your option</option>
                          <option  value="1">First In First Out Algorithm</option>
                          <option value="2">Least Recenty Used Algoritm</option>
                          
                        </select>
                        <label>Select The Alogrithms</label>
                      </div>
                    
                      <div class="input-field col s6">
                        <input id="frame_no" name="frames" type="text" value="" class="validate" required>
                        <label for="frame_no">Enter Numbers of Frames</label>
                      </div>

                      <div class="input-field col s6">
                        <input id="page_no" type="text" name="reference_string" value="" class="validate" required>
                        <label for="page_no">Enter the Pages</label>
                      </div>

                      <div class="row">
                        <div class="col m6 s12 offset-m3 center">
                            <button class="btn waves-effect waves-light blue pulse" type="submit" name="submit">Submit
                            <i class="material-icons right">send</i>
                            </button>
                        </div>
                       </div>
                  </form>
                    </div>
                </div>
      </div>                
</section>




<section class="section section-collateral ">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center black-text darken-4">Output</span>
                        <table class="striped responsive-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>Page Number</th>
                                    <th>Allocated Memory</th>
                                    <th>Page Hit/Fault</th>
       
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                   
                                        <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        </tr>

                                        <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        </tr>
                                    
                                   
                                </tr>
                                  
                            </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


</section>








<?php 

if(isset($_POST['submit']))  {
    
  }





?>




<!-- Preloader -->
<div class="loader preloader-wrapper big active">
  <div class="spinner-layer spinner-blue-only">
    <div class="circle-clipper left">
      <div class="circle"></div>
    </div>
    <div class="gap-patch">
      <div class="circle"></div>
    </div>
    <div class="circle-clipper right">
      <div class="circle"></div>
    </div>
  </div>
</div>
</main>


<!--Import jQuery before materialize.js-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery3.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>



<script>
  // Hide Sections
  $('.section').hide();
  setTimeout(function () {
    $(document).ready(function () {
      // Show Sections
      $('.section').fadeIn();
      
  $('select').material_select();
      // Hide Preloaders
      $('.loader').fadeOut();


      var request;

// Bind to the submit event of our form
$("#fooo").submit(function(event){

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();
    
    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input");
    
    // Serialize the data in the form

    var serializedData = $form.serialize();
    
    console.log(serializedData);
    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        async: true,
        url: "http://osproj.serveo.net/fifo",
        type: "post",
        data: serializedData
     
    });

    // Callback handler that will be called on success
    request.done( function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log(response)
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});














      //Init Side nav
      $('.button-collapse').sideNav();
      // Counter
      $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
          Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
              $(this).text(Math.ceil(now));
            }
          });
      });
      // Comments-Approve & Deny
      $('.approve').click(function (e) {
        Materialize.toast('Comment Approved', 3000);
        e.preventDefault();
      });
      $('.deny').click(function (e) {
        Materialize.toast('Comment Denied', 3000);
        e.preventDefault();
      });

    });
  }, 1000);

</script>
</body>

</html>
