<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang("ctn_1") ?>
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url("hideend/") ?>"><i class="fa fa-dashboard"></i> <?php echo lang("ctn_2") ?></a></li>
        <li><a href="<?php echo site_url("hideend/admin") ?>"><?php echo lang("ctn_1") ?></a></li>
        <li class="active"><?php echo lang("ctn_89") ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang("ctn_90") ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart(site_url("hideend/admin/settings_pro"), array("class" => "form-horizontal")) ?>
              <div class="box-body">
				<div class="form-group">
					<label for="name-in" class="col-sm-2 control-label"><?php echo lang("ctn_91") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name-in" name="site_name" placeholder="" value="<?php echo $this->settings->info->site_name ?>">
						<span class="help-block"><?php echo lang("ctn_92") ?></span>
					</div>
				</div>

				<div class="form-group">
							<label for="desc-in" class="col-sm-2 control-label"><?php echo lang("ctn_93") ?></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="desc-in" name="site_desc" placeholder="" value="<?php echo $this->settings->info->site_desc ?>">
								<span class="help-block"><?php echo lang("ctn_94") ?></span>
							</div>
				</div>
				<div class="form-group">
					<label for="se-in" class="col-sm-2 control-label"><?php echo lang("ctn_95") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="se-in" name="site_email" placeholder="" value="<?php echo $this->settings->info->site_email ?>">
						<span class="help-block"><?php echo lang("ctn_96") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="image-in" class="col-sm-2 control-label"><?php echo lang("ctn_97") ?></label>
					<div class="col-sm-10">
						<?php if(!empty($this->settings->info->site_logo)) : ?>
							<p><img src='<?php echo base_url().$this->settings->info->upload_path_relative . "/" . $this->settings->info->site_logo."_271x40.".$this->settings->info->ext_site_logo ?>'></p>
						<?php endif; ?>
						<label class="fileContainer">
							<span>Choose File...<span>
							<input type="file" name="userfile" size="20" />
						</label>	
						<span class="help-block"><?php echo lang("ctn_98") ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="image-in" class="col-sm-2 control-label"><?php echo lang("ctn_509") ?></label>
					<div class="col-sm-10">
						<?php if(!empty($this->settings->info->site_logo_other)) : ?>
							<p><img src='<?php echo base_url().$this->settings->info->upload_path_relative . "/" . $this->settings->info->site_logo_other."_262x38.".$this->settings->info->ext_site_logo_other ?>'></p>
						<?php endif; ?>
						<label class="fileContainer">
							<span>Choose File...<span>
							<input type="file" name="userfilesiteothers" size="20" />
						</label>	
						<span class="help-block"><?php echo lang("ctn_506") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="image-in" class="col-sm-2 control-label"><?php echo lang("ctn_508") ?></label>
					<div class="col-sm-10">
						<?php if(!empty($this->settings->info->favicon)) : ?>
							<p><img src='<?php echo base_url().$this->settings->info->upload_path_relative . "/" . $this->settings->info->favicon."_67x67.".$this->settings->info->ext_favicon ?>'></p>
						<?php endif; ?>
						<label class="fileContainer">
							<span>Choose File...<span>
							<input type="file" name="userfilefavico" size="20" class="inputfile" />
						</label>	
						<span class="help-block"><?php echo lang("ctn_507") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="pname-in" class="col-sm-2 control-label"><?php echo lang("ctn_99") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="pname-in" name="upload_path" placeholder="" value="<?php echo $this->settings->info->upload_path ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_100") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_101") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dpname-in" name="upload_path_relative" placeholder="" value="<?php echo $this->settings->info->upload_path_relative ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_102") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_103") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dpname-in" name="date_format" placeholder="" value="<?php echo $this->settings->info->date_format ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_104") ?> <a href="http://php.net/manual/en/function.date.php">http://php.net/manual/en/function.date.php</a></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_105") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dpname-in" name="file_types" placeholder="" value="<?php echo $this->settings->info->file_types ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_106") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_107") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dpname-in" name="file_size" placeholder="" value="<?php echo $this->settings->info->file_size ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_108") ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_502") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dpname-in" name="image_num" placeholder="" value="<?php echo $this->settings->info->image_front_num ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_503") ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_511") ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dpname-in" name="currencyRate" placeholder="" value="<?php echo $currencyRate->rates ?>" ><br />
						<span class="help-block"><?php echo lang("ctn_512") ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_344") ?></label>
					<div class="col-sm-10">
						<select name="default_user_role" class="form-control">
						<option value="0"><?php echo lang("ctn_46") ?></option>
						<?php foreach($roles->result() as $r) : ?>
							<option value="<?php echo $r->ID ?>" <?php if($r->ID == $this->settings->info->default_user_role) echo "selected" ?>><?php echo $r->name ?></option>
						<?php endforeach; ?>
						</select>
						<span class="help-block"><?php echo lang("ctn_345") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_376") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="comments" value="1" <?php if($this->settings->info->comments) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_377") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_378") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="menu_highlight" value="1" <?php if($this->settings->info->menu_highlight) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_379") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_109") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="register" value="1" <?php if($this->settings->info->register) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_110") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_111") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="disable_captcha" value="1" <?php if($this->settings->info->disable_captcha) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_112") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_113") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="avatar_upload" value="1" <?php if($this->settings->info->avatar_upload) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_114") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_327") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="login_protect" value="1" <?php if($this->settings->info->login_protect) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_328") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_329") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="activate_account" value="1" <?php if($this->settings->info->activate_account) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_330") ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="dpname-in" class="col-sm-2 control-label"><?php echo lang("ctn_374") ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="secure_login" value="1" <?php if($this->settings->info->secure_login) echo "checked" ?> />
						<span class="help-block"><?php echo lang("ctn_375") ?></span>
					</div>
				</div>
					
				
				
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer ">
                <button type="submit" class="btn btn-primary col-md-12"><?php echo lang("ctn_13") ?></button>
              </div>
			  
            <?php echo form_close() ?>
          </div>
          <!-- /.box -->

         

          

          
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->