<div class="wrap">

<div class="icon32"><img src='<?php echo plugins_url('/images/icon-32.png', dirname(__FILE__))?>' /></div>

        

<h2><?php echo self::PLUGIN_NAME?> <?php echo __('Reports', self::CLASS_NAME)?>:</h2>





<p><?php _e('See the reports on this page:',self::CLASS_NAME)?></p>

    

  		<table width="100%"><tr>

        <td style="vertical-align:top">

        

        <div class="metabox-holder">         

		<div class="postbox" >

        	<h3><?php _e('All Affiliate Urls',self::CLASS_NAME);?></h3>

        

        	<div class="inside">

            

                <p>

					<table class='tabelas'>
                    
                    <tr>
                    
                    <th>
                    <?php _e('Affiliate Url',self::CLASS_NAME);?>
                    </th>
                    <th>
                    <?php _e('Keyword',self::CLASS_NAME);?>
                    </th>
                    <th>
                    <?php _e('Views',self::CLASS_NAME);?>
                    </th>
                    <th>
                    <?php _e('Link for Share',self::CLASS_NAME);?>
                    </th>
                    <td>
                    </td>
                    </tr>
                    
                	<?php

					foreach($afiliados as $aff):
					
						$class = $class == 'tr-blue'?'tr-green':'tr-blue';
					?>

                    <tr class='<?php echo $class;?>'>
                    
                    
                    
                    <td style="max-width:400px; overflow:auto;"><?php echo $aff[0];?></td>
                    
                    <td><?php echo $aff[1];?></td>
                    
                    <td><?php echo $aff[2];?></td>
                    
                    <td><input type="text" value="<?php bloginfo('siteurl'); echo '/' . $aff[1];?>" class="regular-text" readonly="readonly" onclick="this.select();" /></td>
                    
                    <td>
                    <form action="" method="post">
                    <?php
                 	wp_nonce_field('delete',self::CLASS_NAME);
					?>
                    <input type="hidden" name="keyword" value="<?php echo $aff[1]?>" />
                    <input type="submit" name="submit" value="Delete" class="button-primary" />
                    </form>
                    </td>
                    
                    </tr>

                    <?php

					endforeach;

					?>

					</table>
                </p>



			</div>

		</div>

        </div>

            



        <div class="metabox-holder">         

		<div class="postbox" >

        	<h3><?php _e('Last 1000 Views',self::CLASS_NAME);?></h3>

        

        	<div class="inside">

            

                <p>

					<table class='tabelas'>
                    
                    <tr>
                    
                    <th>
                    <?php _e('Keyword',self::CLASS_NAME);?>
                    </th>
                    <th>
                    <?php _e('Date and Time',self::CLASS_NAME);?>
                    </th>
                    <th>
                    <?php _e('Origin',self::CLASS_NAME);?>
                    </th>
                    
                    </tr>
                    
                	<?php

					foreach($last_1000_views as $view):
					
						$class = $class == 'tr-blue'?'tr-green':'tr-blue';
					?>

                    <tr class='<?php echo $class;?>'>
                    
                    <td><?php echo $view[0];?></td>
                    
                    <td><?php echo $view[1];?></td>
                    
                    <td style="max-width:500px; overflow:auto;"><?php echo $view[2];?></td>
                    
                    
                    </tr>

                    <?php

					endforeach;

					?>

					</table>
                </p>



			</div>

		</div>

        </div>

          

   		</td>

        <td style="vertical-align:top; width:410px">

        

        <div class="metabox-holder">

		<div class="postbox" >

        

        	<h3 style="font-size:24px; text-transform:uppercase;color:#F00;">

        	<?php _e('Take a Look!',self::CLASS_NAME);?>

            </h3>

            

             <h3><?php _e('Best Wordpress Themes',self::CLASS_NAME)?>: <a href="http://plugin-wp.net/elegantthemes" target="_blank">Elegant Themes</a></h3>

             

        	<div class="inside">

                <p>

                <a href="http://plugin-wp.net/elegantthemes" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/elegantthemes.jpg" ></a>

				</p>



			</div>

 
 		</div>
        </div>
        
         <div class="metabox-holder">

		<div class="postbox" >           

            <h3><?php _e('Best Autoresponder for Email Marketing',self::CLASS_NAME)?>: <a href="http://plugin-wp.net/trafficwave" target="_blank">TrafficWave</a></h3>

            

        	<div class="inside">

                <p>

                <a href="http://plugin-wp.net/trafficwave" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/trafficwave.jpg"></a>

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