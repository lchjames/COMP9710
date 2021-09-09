<html>
    <?php
    include 'topbar.php';
    ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/styleBG2.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">
            function resizeIframe(obj)
            {
                obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            }
        </script>
    </head>
    <body>
        <div class="split left">
            <?php
            include 'readModules.php';
            ?>
        </div><!-- Left -->

        <div class="split right">
            <iframe src="img/temp pic.png" width="100%" onload="resizeIframe(this)" >
            </iframe>
        </div>
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function () {
                    this.classList.toggle("view");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>

    </body>
</html> 

