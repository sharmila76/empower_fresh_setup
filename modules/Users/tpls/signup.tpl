<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">  
        <title>Signin Template for Bootstrap</title>
    </head>

    <body>
        <form class="form" method="POST">
            <td align="center" class="sign-up">
                <div class="loginBoxShadow" style="width: 460px;">
                    <div class="loginBox">
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">			    
                            <tr class="form-group">					
                                <td align="left" class=""><b style="font-size: 20px;">SignUp</b><br>					
                                </td>					
                            </tr>			
                            <tr class="form-group">
                                <td>
                                    <label for="first_name">Name</label></br>
                                    <input class="form-control" id="first_name" name="first_name" type="text" placeholder="First" required />
                                    <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Last" required />
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td>
                                    <label for="username">Username</label></br>
                                    <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                                </td>
                            </tr>                        
                            <tr class="form-group ">
                                <td>
                                    <label for="email">Email address</label></br>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Email Address" required/>             
                                </td>
                            </tr>                
                            <tr class="form-group">
                                <td>
                                    <label for="password">Password</label></br>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td>
                                    <label class="checkbox">
                                        <input id="agree" name="agree" type="checkbox" value="y" /> <label for="agree">I agree all your <a href="/static/tos.html">Terms of Services</a></label>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-success" name="signup_form" type="submit">Sign Up</button>
                                </td>
                            </tr>  
                        </table>
                    </div>
                </div>
            </td>
        </form>
    </body>
</html>
