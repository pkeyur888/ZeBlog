<?php require_once('header.php');?>
<?php //require_once('nav.php');?>
<?php require_once('conn.php');?>

<div id="content">

    <h2>Registration</h2>

    <div id="comment_form">

        <form autocomplete="off" method="post" action="Controller/UserController.php" enctype="multipart/form-data" id="regi" >

            <div class="form_row">
                <label for="gender">Gender : </label>
                <label><input type="radio" name="gender" value="Male">Male</label>
                <label><input type="radio" name="gender" value="Female">Female</label><br>
                <span class="error">Please select a Gender!</span>
            </div>

            <div class="form_row">
                <label for="fname">Firstname</label><br>
                <input type="text" class="input_field" name="fname" id="fname"><br>
                <span class="error">Firstname cannot be less than 2 characters!
				</span>
            </div>

            <div class="form_row">
                <label for="lname">Lastname</label><br>
                <input type="text" class="input_field" name="lname" id="lname"><br>
                <span class="error">Lastname cannot be less than 2 characters!
				</span>
            </div>

            <div class="form_row">
                <label for="age">Age</label><br>
                <input type="text" class="input_field" name="age" id="age"><br>
                <span class="error">You have to be over 18</span>
            </div>


            <div class="form_row">
                <label for="username">Username</label><br>
                <input type="text" class="input_field" name="username" id="username"><br>
                <span class="error">Your username cannot be less than 5 characters!
				</span>
            </div>

            <div class="form_row">
                <label for="pawd">Password</label><br>
                <input type="password" class="input_field" name="password" id="pswd"><br>
                <span class="error">Your password cannot be less than 5 characters!</span>
            </div>

            <div class="form_row">
                <label for="cpawd">Confirm password</label><br>
                <input type="password" class="input_field" name="cpswd" id="cpswd"><br>
                <span class="error">Password doesn't match!</span>
            </div>

            <div class="form_row">
                <label for="avatar">Avatar</label><br>
                <input type="file" class="input_field" name="avatar" id="avatar"><br>
                <span class="error">Missing Avatar!</span>
            </div>

            <div>
                <input type="submit" class="submit_btn" name="submit" value="Register">
                <input type="reset" class="submit_btn" value="Reset">
            </div>

        </form>

    </div><br><br>
    <div class="cleaner"></div>

</div>

<script>


     var errorColor = "#F44336";
     var validColor = "green";

    $(function(){
        var gender = $("input[name='gender']"),
            fname = $("input[name='fname']"),
            lname = $("input[name='lname']"),
            age = $("input[name='age']"),
            username = $("input[name='username']"),
            password = $("input[name='password']"),
            cpassword = $("input[name='cpswd']"),
            avatar = $("input[name='avatar]");


        //validate name field on the go
        fname.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validatef_Name($(this));
            },
            keyup: function(){
                validatef_Name($(this));
            }
        });

        lname.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validatel_Name($(this));
            },
            keyup: function(){
                validatel_Name($(this));
            }
        });

        age.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validate_age($(this));
            },
            keyup: function(){
                validate_age($(this));
            }
        });

        username.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validate_Username($(this));
            },
            keyup: function(){
                validate_Username($(this));
            }
        });

        password.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validate_password($(this));
            },
            keyup: function(){
                validate_password($(this));
            }
        });

        cpassword.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validate_cpassword($(this));
            },
            keyup: function(){
                validate_cpassword($(this));
            }
        });

        avatar.on({
            focus: function(){
                $(this).css("border-color", "orange");
            },
            blur: function(){
                validate_avatar($(this));
            },
            keyup: function(){
                validate_avatar($(this));
            }
        });

        $("form").submit(function(e){

            // console.log("adhgs");
            resetFrom(); //reset the form in order to revalidate

             var validated = true,
                formValue = "";





            validated = validatef_Name(fname);
            // console.log(validated);
            validated = validatel_Name(lname);

            validated = validate_age(age);

            validated = validate_Username(username);

            validated = validate_password(password);

            validated = validate_cpassword(cpassword);

            validated = validate_avatar(avatar);


            if(!gender.is(":checked")){
                // console.log("adhgs");
                gender.parents("div").find(".error").show("slow");
                validated = false;
            }

            if(validated){

                formValue += "Form submitted : \n\n";
                formValue += "Gender: " + gender.filter(":checked").val() + "\n";
                formValue += "FirstName: " + fname.val() + "\n";
                formValue += "LastName: " + lname.val() + "\n";
                formValue += "Age: " + age.val() + " years old\n";
                formValue += "UserName: " + username.val() + "\n";
                formValue += "Avatar:" + avatar.val() + "\n";

                validated = confirm(formValue);
            }
            // console.log(validated);
            return validated;
        });

        $("input[type='reset']").click(function(){
            resetFrom();
        });

    });


    function validatef_Name(el){
        var valid = true;

        if(el.val().length < 2){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }

    function validatel_Name(el){
        var valid = true;

        if(el.val().length < 2){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }

    function validate_age(el){
        var valid = true;

        if(el.val() == ""){
            el.css("border-color", errorColor);
            el.next().text("Age cannot be empty!");
            el.next().next().show("slow");
            valid = false;
        }else if(isNaN(el.val())){
            el.css("border-color", errorColor);
            el.next().text("Age should be a number!");
            el.next().next().show("slow");
            valid = false;
        }else if(parseInt(el.val()) < 5 || parseInt(el.val()) > 150 ){
            el.css("border-color", errorColor);
            el.next().text("Your age must be between 5 and 150!");
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }

    function validate_Username(el){
        var valid = true;

        if(el.val().length < 5){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }

    function validate_password(el){
        var valid = true;

        if(el.val().length < 5){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }

    function validate_cpassword(el){
        var valid = true;
        var main = $("input[name='password']")

        if(el.val()==""){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }
        else if(el.val()!= main.val()){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }

    function validate_avatar(el){
        var valid = true;

        if(el.val().length == ""){
            el.css("border-color", errorColor);
            el.next().next().show("slow");
            valid = false;
        }else{
            el.css("border-color", validColor);
            el.next().next().hide("slow");
        }

        return valid;
    }


    function resetFrom(){
        // console.log("11111");
        $(".error").hide();
        $("form input, form select").css("border-color", "gray");
        $("label").css("color", "black");
    }
</script>
<?php //require_once('footer.php');?>



