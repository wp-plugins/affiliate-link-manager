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

					
					<table class='tabelas' width="100%">
                    
                	<?php

					foreach($afiliados as $aff):
					
						$class = $class == 'tr-blue'?'tr-green':'tr-blue';
					?>
                    <form action="" method="post">
                    <tr>
                    
                    <td>
                   
                    </td>
                    <td>
                    
                    </td>
                     <td rowspan="5">
                    <input type="submit" name="submit" value="Update" class="button-primary" /><br /><br />
                    <input type="submit" name="submit" value="Delete" style="background-color:red;" class="button-primary" />
                    </td>                   
                    </tr>
                                        
					<form action="" method="post">                   
                    <tr class='<?php echo $class;?>'>
                    
                    <td style="max-width:400px; overflow:auto;"><?php _e('Link for Share',self::CLASS_NAME);?>: <input type="text" class="regular-text" onclick="javascript:this.select();" value="<?php bloginfo('siteurl'); echo '/' . $aff[1];?>" readonly="readonly"></td>
                    
                    <td><?php _e('Views',self::CLASS_NAME);?>: <?php echo $aff[2];?></td>
                    
                    </tr>
                    <tr class='<?php echo $class;?>'>
                    <td colspan="2">
                    <?php _e('Keyword',self::CLASS_NAME)?>:  <input name="keyword" class="regular-text code" type="text" value="<?php if(isset($aff[1])) echo $aff[1];?>" />
                    <input name="keywordoriginal" class="regular-text code" type="hidden" value="<?php if(isset($aff[1])) echo $aff[1];?>" />
                    </td>
                    </tr>     
                     <tr class='<?php echo $class;?>'>
                    <td colspan="2">
                    <?php _e('Affiliate Url',self::CLASS_NAME)?>:  <input name="affiliate" class="regular-text code" type="text" value="<?php if(isset($aff[0])) echo $aff[0];?>" />
                    </td>
                    </tr>                                   
                    <tr class='<?php echo $class;?>'>
                    <td colspan="2">
                    <?php _e('Description',self::CLASS_NAME)?>:  <textarea name="descricao" class="large-text code"><?php if(isset($aff[3])) echo $aff[3];?></textarea>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2">
                    
                    <?php
                 	wp_nonce_field('delete',self::CLASS_NAME);
					?>
                    </td>
                    
                    </tr>

                    </form>
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
       

		<iframe src="http://plugin-wp.net/banners/?l=<?php echo $lang?>" width="400" height="800" frameborder="0" scrolling="no"></iframe>
  

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