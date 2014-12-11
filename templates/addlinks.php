<div class="wrap">

<div class="icon32"><img src='<?php echo plugins_url('/images/icon-32.png', dirname(__FILE__))?>' /></div>

        

<h2><?php echo __('Settings', self::CLASS_NAME)?> <?php echo self::PLUGIN_NAME?>:</h2>





<p><?php _e('Set up the plugin Options at this page',self::CLASS_NAME)?></p>

    

  		<table width="100%"><tr>

        <td style="vertical-align:top">

 

 		<form action="" method="post">

        
				<?php
                 wp_nonce_field('add',self::CLASS_NAME);
				?>
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
                	<input type="text" name="url_afiliado" class="regular-text" value="<?php if(isset($_POST['url_afiliado'])) echo $_POST['url_afiliado']?>" /> 
                </td>
                
                <td>
                	<input type="text" name="palavra_chave" class="regular-text" value="<?php if(isset($_POST['palavra_chave'])) echo $_POST['palavra_chave']?>" />
                </td>
                </tr>
                
                <tr>
                <td colspan="2">
                <?php _e('Description',self::CLASS_NAME)?>:  <textarea name="descricao" class="large-text code"></textarea>
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