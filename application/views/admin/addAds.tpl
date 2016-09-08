{extends file='admin\public.tpl'}
{block name=content}
{if validation_errors()}
    <div class="alert alert-danger">
        <strong>添加失败</strong>{form_error('title')}{form_error('url')}
    </div>
{elseif $errors}
    <div class="alert alert-danger">
        <strong>添加失败</strong>{$errors['error']}
    </div>
{/if}

    <div class="col-lg-6">
        <h4>添加轮播图</h4>
        <form role="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">标题名称</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入广告标题" name="title" value="{set_value('title')}">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">链接地址</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入广告链接" name="url" value="{set_value('url')}">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">上传图片</label>
                    <input type="file" name = 'image' id="up_img"/>
                </div>
                <div class="form-group" id="imgdiv">
                    <img id="imgShow" width="300" />
                </div>
                <br>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
{/block}