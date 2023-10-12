<?php
return"
    <body>
        <div class=\"login-page\">
            <form action='/pay' method='post'>
                <div class='put' style=\"display:block\"> 
                    <span>金額</span>
                    <input type='text' name='money' id='money'>
                    <span>目標</span>
                    <input type='text' name='user' id='user'>
                    <input type='submit' name='pay' value='付款' id='pay'>
               </div>
            </form>
        </div>
    </body>
";
?>