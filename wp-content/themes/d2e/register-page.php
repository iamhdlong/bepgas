<?php 
// Template name: register page
get_header();
?>

<?php

global $user;

 ?>

 <section>
         <div id="head">
            <div class="line">
               <h1>Example of contact page</h1>
            </div>
         </div>
         <div id="content" class="left-align contact-page">
            <div class="line">
               <div class="margin">
                  <div class="s-12 l-6">
                     <?php 
                     		//wp_register();
                        $d2e_theme->member()->registration_form();
                     ?>
                   
                  </div>
                 
               </div>
            </div>
         </div>
         <!-- MAP -->	
        
       
      </section>


<?php get_footer(); ?>