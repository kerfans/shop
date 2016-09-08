{extends file='admin\public.tpl'}
{block name=content}
{if validation_errors()}
    <div class="alert alert-danger">
        <strong>添加失败</strong>{form_error('typename')}{form_error('classid')}
    </div>
{/if}
    <div class="col-lg-6">
        <h4>添加分类</h4>
        <form role="form" action="typeList/index" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">输入分类名称</label>
                    <input class="form-control" id="disabledInput" type="text" name="typename" placeholder="请输入分类名称" value="{set_value('typename')}">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">选择所属分类</label>
                    <select id="disabledSelect" name="classid" class="form-control">
                        <option value="1"  selected="selected">实体分类</option>
                        <option value="2">虚拟分类</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
{/block}