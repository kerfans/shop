{extends file='admin\public.tpl'}
{block name=content}
{if validation_errors()}
    <div class="alert alert-danger">
        <strong>更改失败</strong>{form_error('typename')}{form_error('remark')}
    </div>
{/if}
    <div class="col-lg-6">
        <h4>更改分类</h4>
        <form role="form" action="" method="post">
            <input type="hidden" name="tid" value="{$typeinfo->id}"/>
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">所属类别</label>
                    {if $typeinfo->class eq 1}
                    <h5>实体商品</h5>
                    {else if $typeinfo->class eq 2}
                    <h5>虚拟商品</h5>
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">分类名称</label>
                    {if set_value('typename')}
                    <input class="form-control" id="disabledInput" type="text" name="typename" placeholder="请输入分类名称" value="{set_value('typename')}">
                    {else}
                    <input class="form-control" id="disabledInput" type="text" name="typename" placeholder="请输入分类名称" value="{$typeinfo->name}">
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">是否禁用</label><br>
                    {if $typeinfo->status eq 0}
                    <input  id="disabledInput" type="radio" name="status" value="0" checked/>禁用&nbsp;&nbsp;
                    <input  id="disabledInput" type="radio" name="status" value="1"/>可用
                    {else}
                    <input  id="disabledInput" type="radio" name="status" value="0"/>禁用&nbsp;&nbsp;
                    <input  id="disabledInput" type="radio" name="status" value="1" checked/>可用
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">备注</label>
                    {if set_value('remark')}
                    <textarea  class="form-control" id="disabledInput" style="resize:none;" name="remark">{set_value('remark')}</textarea>
                    {else}
                    <textarea  class="form-control" id="disabledInput" style="resize:none;" name="remark">{$typeinfo->remark}</textarea>
                    {/if}
                </div>
                <div class="form-group">
                    <label for="disabledSelect">添加人</label>
                    <h5>{$caname}</h5>
                </div>
                <div class="form-group">
                    <label for="disabledSelect">添加时间</label>
                    <h5>{$typeinfo->ctime|date_format:"%Y-%m-%d %H:%M:%S"}</h5>
                </div>
                <div class="form-group">
                    <label for="disabledSelect">修改人</label>
                    <h5>{$maname}</h5>
                </div>
                <div class="form-group">
                    <label for="disabledSelect">修改时间</label>
                    {if $typeinfo->mtime}
                    <h5>{$typeinfo->mtime|date_format:"%Y-%m-%d %H:%M:%S"}</h5>
                    {else}
                    <h5>无</h5>
                    {/if}
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
{/block}