{extends file='admin\public.tpl'}
{block name=content}
    <div class="col-lg-6">
        <h4>添加分类</h4>
        <form role="form" action="" method="">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">输入分类名称</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="请输入分类名称">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">选择所属分类</label>
                    <select id="disabledSelect" name="" class="form-control">
                        <option value="">实体分类</option>
                        <option value="">虚拟分类</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
{/block}