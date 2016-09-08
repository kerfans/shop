{extends file='admin\public.tpl'}
{block name=content}
{if validation_errors()}
    <div class="alert alert-danger">
        <strong>更改失败</strong>{form_error('title')}{form_error('url')}{form_error('sort')}
    </div>
{elseif $errors}
    <div class="alert alert-danger">
        <strong>添加失败</strong>{$errors['error']}
    </div>
{/if}
    <div class="col-lg-6">
        <h4>更改轮播广告</h4>
        <form role="form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{$adinfo->id}"/>
            <input type="hidden" name="oldimg" value="{$adinfo->picture}"/>
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">广告标题</label>
                    {if set_value('title')}
                    <input class="form-control" id="disabledInput" type="text" name="title" placeholder="请输入广告标题" value="{set_value('title')}">
                    {else}
                    <input class="form-control" id="disabledInput" type="text" name="title" placeholder="请输入广告标题" value="{$adinfo->title}">
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">广告图片</label><br>
                    
                    <img src="{$smarty.const.IMG_ADMIN_URL}{$adinfo->picture}" id="imgShow" width="300" />
                    <input type="file" name = 'image' id="up_img"/>
                </div>
                
                <div class="form-group">
                    <label for="disabledSelect">链接地址</label>
                    {if set_value('url')}
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入广告链接" name="url" value="{set_value('url')}">
                    {else}
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入广告链接" name="url" value="{$adinfo->url}">
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">权重排序</label>
                    {if set_value('sort')}
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入排序" name="sort" value="{set_value('sort')}">
                    {else}
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入排序" name="sort" value="{$adinfo->sort}">
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">是否禁用</label><br>
                    {if $adinfo->status eq 0}
                    <input  id="disabledInput" type="radio" name="status" value="0" checked/>禁用&nbsp;&nbsp;
                    <input  id="disabledInput" type="radio" name="status" value="1"/>可用
                    {else}
                    <input  id="disabledInput" type="radio" name="status" value="0"/>禁用&nbsp;&nbsp;
                    <input  id="disabledInput" type="radio" name="status" value="1" checked/>可用
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">添加人</label>
                    <h5>{$aaname}</h5>
                </div>
                <div class="form-group">
                    <label for="disabledSelect">添加时间</label>
                    <h5>{$adinfo->atime|date_format:"%Y-%m-%d %H:%M:%S"}</h5>
                </div>
                
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
{/block}