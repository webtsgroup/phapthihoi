<div class="row">
    <div class="col-md-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"><?=__('Site info')?></a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"><?=__('Seo')?></a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                      <fieldset class="form-horizontal">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Site Name',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_name', array(
                                'name' => 'cf_site_name',
                                'id' => 'cf_site_name',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_name'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Phone',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_phone', array(
                                'name' => 'cf_site_phone',
                                'id' => 'cf_site_phone',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_phone'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Hotline',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_hotline', array(
                                'name' => 'cf_site_hotline',
                                'id' => 'cf_site_hotline',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_hotline'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Phone',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_email', array(
                                'name' => 'cf_site_email',
                                'id' => 'cf_site_email',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_email'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Showroom',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_address', array(
                                'name' => 'cf_site_address',
                                'id' => 'cf_site_address',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_address'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Factory',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_address1', array(
                                'name' => 'cf_site_address1',
                                'id' => 'cf_site_address1',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_address1'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Copyright',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('cf_site_copyright', array(
                                'name' => 'cf_site_copyright',
                                'id' => 'cf_site_copyright',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['cf_site_copyright'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                      <fieldset class="form-horizontal">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Title',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('seo_title', array(
                                'name' => 'seo_title',
                                'id' => 'seo_title',
                                'div' => false,
                                'label' => false,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['seo_title'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Keyword',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('seo_keyword', array(
                                'type' => 'textarea',
                                'name' => 'seo_keyword',
                                'id' => 'seo_keyword',
                                'div' => false,
                                'label' => false,
                                'rows' => 3,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['seo_keyword'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label"><?php echo __('Description',true); ?></label>
                          <div class="col-sm-6">
                            <?php
                            echo $this->Form->input('seo_description', array(
                                'type' => 'textarea',
                                'name' => 'seo_description',
                                'id' => 'seo_description',
                                'div' => false,
                                'label' => false,
                                'rows' => 4,
                                'class' => 'form-control',
                                "default" => &$systemConfigs['seo_description'],
                                'onchange' => "editMe(this.id, this.value);",
                              )
                            );
                            ?>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
