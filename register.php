<?php
        include 'include.php';
?>
                
<div class='row'>
        <div class='col-sm-6'>
                <form action='ProcessReg.php' method='POST'>
                        <div class='form-group'>
                                <label>Username</label>
                                <input type='text' name='username' placeholder='Username' class='form-control' required='yes' autofocus='yes'>
                        </div>
                        <div class='form-group'>
                                <label>Password</label>
                                <input type='password' name='password' placeholder='Password' class='form-control' required='yes'>
                        </div>
                        <div class='checkbox'>
                                <label>
                                       <input type='checkbox' name='admin'> Admin
                                </label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                </form>
        </div>
<div class='row'>
        
<?php
        include 'footer.php';        
?>