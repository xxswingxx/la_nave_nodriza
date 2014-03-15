<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since La Nave Nodriza 1.0
 */
?>  
        <footer role="contentinfo" id="contact">
            <div class="content"> <!-- brand bar -->
                <div class="end-bar">
                    <div class="legal">
                        &copy; Lanavenodriza.com
                    </div>
                    <div class="contact-us">
                        <a href="mailto:hola@lanavenodriza.com">hola@lanavenodriza.com</a> - 91 622 67 91                   
                    </div>                
                </div>
                <!-- /brand bar -->
            </div> 
        </footer>
        <?php wp_footer(); ?>
    </body>
    <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-45860105-1', 'lanavenodriza.com');
         ga('send', 'pageview');
    </script>
</html>