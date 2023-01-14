
/*Form Validation function sourced from
Title: Bootstrap Form Documentation
Author: Bootstrap
Date: 2020
Availability: https://getbootstrap.com/docs/4.0/components/forms/#validation
*/
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
});

$(document).ready(function(){
    //On submit of #searchForm
    $("#searchForm").submit(function(event){
        event.preventDefault();
        var request;
        var form = $(this);
        if (request){
            request.abort();
        }
        var title = $('#title').val()
        var module = $('#module').val()
        var author = $('#author').val() 
        if (title == "" && module == "" && author =="") {
            alert("Please enter at least 1 search field");
            location.reload();
        }
        else{
            var inputs = $(this).find("input");
            inputs.prop("disabled", true);
            request = $.ajax({
                url: "Resources.php",
                type: "post",
                data:{
                    title: title,
                    module:module,
                    author:author,
                    //property looked by php : variable,
                    form: '#searchForm'
                }});
            request.done(function(response, textStaus, jqXHR){
                console.log(response)
                if (response.includes("Success")){
                    location.assign("Search.php")
                }
            });
            //If callback is failed
            request.fail(function(jqXHR, textStatus, errorThrown){
                //Log the error to the console
                console.error(
                    "The following error occured: "
                )})
        }
    })
})

$(document).ready(function(){
    //On submit of create account form
    $("#createAccountForm").submit(function(event){
        //Checks validity
        if(this.checkValidity() === false){
            return;
        }
        event.preventDefault();
        /*Ajax request adapted from
        Title: API Documentation jQuery.ajax()
        Author: The jQuery Foundation
        Date:2020
        Availability:https://api.jquery.com/jquery.ajax/
        */
        var request;
        var form = $(this);

        if (request){
            request.abort();
        }
        //Gets variables from the form
        var email = $('#sign-up-email').val()
        var password = $('#sign-up-password').val()
        var firstName = $('#sign-up-first-name').val()
        var lastName = $('#sign-up-last-name').val()
        var inputs = $(this).find("input");
        inputs.prop("disabled", true);
        request = $.ajax({
            //Runs User.php
            url: "User.php",
            type: "post",
            data:{
                email: email,
                password: password,
                firstName: firstName,
                lastName: lastName,
                //property looked by php : variable,
                form: '#createAccountForm'
            }
        });
        request.done(function(response, textStaus, jqXHR){
            console.log(response)
            if (response.includes("email")){
                //If the email is already used in the database User.php echos "email" which alerts the user the email is in use and the page reloads
                alert("This email is already in use")
                location.reload();
            }
            if (response.includes("Yes")){
                //If sign in was successful the user is taken to the main index page
                location.assign("index.php")
            }
        });
        //If callback is failed
        request.fail(function(jqXHR, textStatus, errorThrown){
            //Log the error to the console
            console.error(
                "The following error occured: "
            )})
    })})
//On submit of create account form
$("#log-in-form").submit(function(event){
    //Checks Validity
    if(this.checkValidity() === false){
        return;
    }
    event.preventDefault();
    /*Ajax request adapted from
        Title: API Documentation jQuery.ajax()
        Author: The jQuery Foundation
        Date:2020
        Availability:https://api.jquery.com/jquery.ajax/
        */
    var request;
    var form = $(this);
    if (request){
        request.abort();
    }
    //Gets variable from the form
    var email = $('#log-in-email').val()
    var password = $('#log-in-password').val()
    var inputs = $(this).find("input");
    inputs.prop("disabled", true);
    request = $.ajax({
        url: "User.php",
        type: "post",
        data:{
            email: email,
            password: password,
            //property looked by php : variable,
            form: '#log-in-form'
        }
    });
    request.done(function(response, textStaus, jqXHR){
        console.log(response)
        if (response.includes("failed-log-in")){
            //Alert if there is no match in the database to the corresponding email and password and the page is reloaded
            alert("Please verify email and password are correct")
            location.reload();
        }
        if(response.includes("Logged-In")){
            //If the sign-in was successful the user is taken to the main index page
            location.assign("index.php");
        }
    })
    //If callback is failed
    request.fail(function(jqXHR, textStatus, errorThrown){
        //Log the error to the console
        console.error("The following error occured: ")
    })
})
//Function when called by pressing the reserve button besides a resource in the search
//My own function
function reserveItem(title){
    //Replaces all _ with " " from the given parameter and assigns it to a variable
    var title = title.replace(/_/g, " ");
    /*Ajax request adapted from
        Title: API Documentation jQuery.ajax()
        Author: The jQuery Foundation
        Date:2020
        Availability:https://api.jquery.com/jquery.ajax/
        */
    request = $.ajax({
        url: "Loan.php",
        type: "post",
        data:{
            title: title,
        }});
    request.done(function(response, textStaus, jqXHR){
        console.log(response)
        if (response.includes("Reserved")){
            //If an entry has been created the user is alerted that the resource has been reserved for them
            alert("This item has been reserved for you");
        }
        //If the user isn't signed in they are alerted that they cannot reserve a resource without a login
        else if(response.includes("noUser")){
            alert("You must have an account to reserve a resource");
        }
    });
    //If callback is failed
    request.fail(function(jqXHR, textStatus, errorThrown){
        //Log the error to the console
        console.error(
            "The following error occured: "
        )})

}




















