<?php
return"
    <body>
        <div class=\"login-page\">
            <form action='/login' method='post'>
                <div class='put' style=\"display:block\"> 
                    <span>帳號</span>
                    <input type='text' name='user' id='user'>
                    <span>密碼</span>
                    <input type='password' name='pass' id='pass'>
                    <input type='submit' name='login' value='登入'>
               </div>
            </form>
        </div>
    </body>
";
?>