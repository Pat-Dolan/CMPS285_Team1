        <div id ="login">
           <?php if(isset($account_created)){?>
                <h3><?php echo $account_created;?> </h3>
            <?php }else {?>
            <h1> Login, Please</h1>
            <?php }?>

            <?php

                echo form_open('login_controller/validate_credentials');
                echo form_input('username','Username');
                echo form_password('password','Password');
                echo form_submit('submit' , 'Login');
                echo anchor('Login_controller/sign_up','Create Account');

            ?>
        </div>