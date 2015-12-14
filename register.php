<?php
         /*Copyright (c) 2015 Frankie Cancino, Quinton Miller, Trent Broeker, Sydney Bates, Matt Haruza



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
        $pageOptions["adminRequired"] = true;
        
        include 'include.php';
?>
                
<div class='row'>
        <div class='col-sm-6'>
                <h1>Add New User</h1>
                <form action='ProcessReg.php' method='POST'>
                        <div class='form-group'>
                                <br>
                                <label>Username</label>
                                <input type='text' name='username' placeholder='Username' class='form-control' required='yes' autofocus='yes'>
                        </div>
                        <div class='form-group'>
                                <label>Password</label>
                                <input type='password' name='password' placeholder='Password' class='form-control' required='yes'>
                        </div>
                        <div class='btn-group' data-toggle='buttons'>
                                <label class='btn btn-default'>
                                       <input type='checkbox' name='admin'> Admin
                                </label>
                        </div> 
                        <button type="submit" class="btn btn-info">Submit</button>
                </form>
        </div>
</div>
        
<?php
        include 'footer.php';        
?>