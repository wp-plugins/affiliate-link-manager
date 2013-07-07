<div class="wrap">

<div class="icon32"><img src='<?php echo plugins_url('/images/icon-32.png', dirname(__FILE__))?>' /></div>

        

<h2><?php echo __('Settings', self::CLASS_NAME)?> <?php echo self::PLUGIN_NAME?>:</h2>





<p><?php _e('Set up the plugin Options at this page',self::CLASS_NAME)?></p>

    

  		<table width="100%"><tr>

        <td style="vertical-align:top">

 

 		<form action="" method="post">

        

        <div class="metabox-holder">         

		<div class="postbox" >

        

        	<h3><?php _e('Add new Affiliate Links',self::CLASS_NAME);?></h3>

        

        	<div class="inside">


                 <p>

                <label><?php _e('Enter some affiliate url and its respective keyword',self::CLASS_NAME);?>:</label>

                <table>
                <tr>
                <td>
                
                <?php _e('Affiliate url',self::CLASS_NAME)?>: 
                
                </td>
                <td>
				<?php _e('Keyword',self::CLASS_NAME)?>: (<small><?php _e('Just numbers an letters',self::CLASS_NAME)?></small>)
                </td>
                </tr>
                <tr>
                
                <td>
                	<input type="text" name="url_afiliado" class="regular-text" /> 
                </td>
                
                <td>
                	aff_<input type="text" name="palavra_chave" class="regular-text" />
                </td>
                </tr>
                </table>

               

                </p> 
                            

                <p>

                <input type="submit" name="submit" value="<?php _e('Add', self::CLASS_NAME);?>" class="button-primary" />

				</p>



			</div>

		</div>

        </div>
 		</form>

          

   		</td>

        <td style="vertical-align:top; width:410px">

        

        <div class="metabox-holder">

		<div class="postbox" >

        

        	<h3 style="font-size:24px; text-transform:uppercase;color:#F00;">

        	<?php _e('Take a Look!',self::CLASS_NAME);?>

            </h3>

            

             <h3><?php _e('Best Wordpress Themes',self::CLASS_NAME)?>: <a href="http://plugin-wp.net/aff_elegantthemes" target="_blank">Elegant Themes</a></h3>

             

        	<div class="inside">

                <p>

                <a href="http://plugin-wp.net/aff_elegantthemes" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/elegantthemes.jpg" ></a>

				</p>



			</div>

 
 		</div>
        </div>
        
         <div class="metabox-holder">

		<div class="postbox" >           

            <h3><?php _e('Best Web Hosting for Wordpress',self::CLASS_NAME)?>: <a href="<?php _e('http://plugin-wp.net/aff_hostgator',self::CLASS_NAME)?>" target="_blank">Host Gator</a></h3>

            

        	<div class="inside">

                <p>

                <a href="http://plugin-wp.net/aff_hostgator" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/hostgator.jpg"></a>

				</p>



			</div> 

                        

		</div>

        </div>

              

       </td>

       </tr>

       </table>





<hr />





<table>

<tr>

<td>

<img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/anderson-makiyama.png" />

</td>

<td>

<ul>



<li><?php _e('Author',self::CLASS_NAME);?>: <strong>Anderson Makiyama</strong>



</li>



<li><?php _e("Author's email",self::CLASS_NAME);?>: <a href="mailto:andersonmaki@gmail.com" target="_blank">andersonmaki@gmail.com</a>



</li>



<li><?php _e('Visit the Plugin page',self::CLASS_NAME);?>: <a href="<?php echo self::PLUGIN_PAGE?>" target="_blank"><?php echo self::PLUGIN_PAGE?></a>



</li>



<li>



<?php _e("Visit the author's site",self::CLASS_NAME);?>: <a href="http://plugin-wp.net" target="_blank">www.Plugin-WP.net</a>



</li>



</ul>

</td>

</tr>

</table>



</div>