<?php 
// Template name: login page
get_header();
?>

<?php

global $user;

// is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) 

if($d2e_theme->get_user_login('id')) return wp_redirect( home_url() );
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
                     <?php  wp_login_form();   ?>

                  </div>
                 
               </div>
            </div>
         </div>
         <!-- MAP -->	
        
       
      </section>


<?php get_footer(); ?>