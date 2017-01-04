<section id="subheader" data-speed="8" data-type="background" style="background-position: 50% 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?=$urlSetting['about']['text']?></h1>
            </div>
        </div>
    </div>
</section>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3><?=$result['title']?></h3>
                <article style="margin-top: 40px">
                  <?=$result['content']?>
                </article>
            </div>
            <div id="sidebar" class="col-md-3">
              <?=$this->element('cat')?>
            </div>
        </div>
    </div>
</div>
