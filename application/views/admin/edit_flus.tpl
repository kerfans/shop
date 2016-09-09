{extends file='admin\public.tpl'}
{block name=content}
    {if validation_errors()}
        <strong style="color: red">{$errors}{form_error('title')}{form_error('stock_num')}{form_error('cost_points')}{form_error('sort')}{form_error('describe')}</strong>
    {/if}
    {if $errors}
        <strong style="color: red">{$errors['error']}</strong>
    {/if}
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-lg-11">
            <h1 class="text-center" style="color: red">设置积分兑换流量</h1>
            <div class="form-horizontal" role="form" >
                <fieldset>
                    <legend>使用规则</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color: red">显示标题</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="ds_host" name="title" type="text" value="{$da['title']}" placeholder="请填入显示标题" required/>
                        </div>
                        <label class="col-sm-2 control-label" style="color: red">流量包大小<br>（单位M）</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="ds_host" name="flow" type="text" value="{$data['flow']}" placeholder="请填入流量包大小" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username" style="color: red">兑换需求积分</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="ds_host" name="cost_points" type="text" value="{$da['cost_points']}" placeholder="请填入兑换需求积分" required/>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_username" style="color: red">库存数量</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="ds_host" name="stock_num" type="text" value="{$da['stock_num']}" placeholder="请填入库存数量" required/>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username" style="color: red">权重<br>(越大越靠前)</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="ds_host" name="sort" type="text" value="{$da['sort']}" placeholder="请填入权重" required/>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_username" style="color: red">运营商</label>
                        <div class="col-sm-4">
                            <select id="disabledSelect" name="operator" class="form-control">
                                <option value="1"{if $data['operator'] == 1} selected{/if}>移动</option>
                                <option value="2"{if $data['operator'] == 2} selected{/if}>联通</option>
                                <option value="3"{if $data['operator'] == 3} selected{/if}>电信</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username" style="color: red">是否上架</label>
                        <div class="col-sm-4">
                            <select id="disabledSelect" name="is_sale" class="form-control">
                                <option value="1"{if $da['is_sale'] == 1} selected{/if}>上架</option>
                                <option value="0"{if $da['is_sale'] == 0} selected{/if}>下架</option>
                            </select>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_password" style="color: red">是否热销</label>
                        <div class="col-sm-4">
                            <select id="disabledSelect" name="is_hot" class="form-control">
                                <option value="0"{if $da['is_hot'] == 0} selected{/if}>普通</option>
                                <option value="1"{if $da['is_hot'] == 1} selected{/if}>热销</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username" >类别（不可更改）</label>
                        <div class="col-sm-4">
                            <label class="form-control">虚拟</label>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_password" >类型（不可更改）</label>
                        <div class="col-sm-4">
                            <label class="form-control">兑换流量</label>
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username" style="color: red">流量说明描述</label>
                        <div class="col-sm-4">
                            <textarea name="describe" id="" cols="50" rows="10" required>{$da['describe']}</textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend style="color: red">上传显示图片</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" >选择图片</label>
                        <div class="col-sm-4">
                            <input type="file" name = 'picture' id="up_img"/><br><br><br><br><br><br><br><br>
                            <div class="form-group" >
                                <div class="col-sm-6 ">
                                    <input class="btn btn-bg btn-success" type="submit" value="确 认 添 加">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div id="imgdiv"><img id="imgShow" src="{$da['picture']}" width="300" /></div>
                            <input type="hidden" name="picture" value="{$da['picture']}">
                        </div>
                    </div>
                </fieldset>
    </form>
    </div>
{/block}