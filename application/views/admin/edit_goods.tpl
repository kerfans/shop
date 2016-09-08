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
            <h1 class="text-center" style="color: red">原实体商品详情</h1>
            <div class="form-horizontal" role="form" >
                <fieldset>
                    <legend>商品详情</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">商品ID</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['goods_id']}</label>
                            <input  type="hidden" name="pid" value="{$data[0]['goods_id']}">
                        </div>
                        <label class="col-sm-2 control-label" >商品名称</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['goods_name']}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username">海典SN编号</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['goods_sn']}</label>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_password">商品重量</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['goods_weight']} g</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">门店价格</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['shop_price']}</label>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_username">市场价格</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['market_price']}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username">规格</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['guige']}</label>
                        </div>
                        <label class="col-sm-2 control-label" for="ds_username">通用名称</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['common_name']}</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">计量单位</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['product_unit']}</label>
                        </div>
                        <label class="col-sm-2 control-label" >国药准字</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['ratifier_no']}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username">商家ID</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['shop_id']}</label>
                        </div>
                        <label class="col-sm-2 control-label" >生产厂家</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['company']}</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">库存数量</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['goods_number']}</label>
                        </div>
                        <label class="col-sm-2 control-label" >经销商ID</label>
                        <div class="col-sm-4">
                            <label class="form-control">{$data[0]['dealer_id']}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username">是否为实体商品</label>
                        <div class="col-sm-4">
                            {if $data[0]['is_real'] eq 1}
                                <label class="form-control">实体商品</label>
                            {else}
                                <label class="form-control">不是实体</label>
                            {/if}
                        </div>
                        <label class="col-sm-2 control-label" for="ds_username">是否为积分商品</label>
                        <div class="col-sm-4">
                            {if $data[0]['is_integral'] eq 1}
                                <label class="form-control">积分商品</label>
                            {else}
                                <label class="form-control">非积分商品</label>
                            {/if}
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">是否上架</label>
                        <div class="col-sm-4">
                            {if $data[0]['is_on_sale'] eq 1}
                                <label class="form-control">上架中</label>
                            {else}
                                <label class="form-control">下架中</label>
                            {/if}
                        </div>
                        <label class="col-sm-2 control-label" >药品类型</label>
                        <div class="col-sm-4">
                            {if $data[0]['prescription_type'] eq 0}
                                <label class="form-control">处方药</label>
                            {elseif $data[0]['prescription_type'] eq 1}
                                <label class="form-control">非处方药</label>
                            {else}
                                <label class="form-control">非药品</label>
                            {/if}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ds_username">是否为特殊商品</label>
                        <div class="col-sm-4">
                            {if $data[0]['is_special'] eq 0}
                                <label class="form-control">普通药品</label>
                            {elseif $data[0]['is_special'] eq 1}
                                <label class="form-control">DTC</label>
                            {else}
                                <label class="form-control">生物制剂</label>
                            {/if}
                        </div>

                    </div>
                </fieldset>
                <fieldset>
                    <legend>商品说明</legend>
                    <table class="table">
                        <thead>
                        {foreach from=$data[1] item="foo"}
                        <tr>
                            <th style="width: 150px">{$foo['attr_name']}</th>
                            <td>{$foo['attr_content']}</td>
                        </tr>
                        {/foreach}
                        </thead>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>商品图片</legend>
                    <table class="table">
                        <thead>
                            <tr>
                                {foreach from=$data[2] item="foo"}
                                    <img src="http://img.yaofang.cn/{$foo['thumb_url']}">&nbsp;&nbsp;
                                {/foreach}
                            </tr>
                        </thead>
                    </table>
                </fieldset>
            </div>
            <h1 class="text-center" style="color: red">自定义区域</h1><br><br>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_host" style="color: red">货架显示名称<br>（默认和原名一致）</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="ds_host" name="title" type="text" value="{$data[0]['goods_name']}" placeholder="请填入货架显示名称" required/>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_name" style="color: red">商品数量<br>(初始默认100)</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="ds_name" name="stock_num" type="text" value="100" placeholder="请输入商品数量" required/>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" style="color: red">兑换需要积分<br>(初始默认50W)</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" value="500000" name="cost_points" placeholder="请输入兑换需求积分" required/>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_password" style="color: red" >权重<br>(越大越靠前)</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="sort" value="0" placeholder="请输入权重（越大越靠前显示）" required/>
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" style="color: red">是否上架</label>
                    <div class="col-sm-4">
                        <select id="disabledSelect" name="is_sale" class="form-control">
                            <option value="1">上架</option>
                            <option value="0">下架</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_password" style="color: red">是否热销</label>
                    <div class="col-sm-4">
                        <select id="disabledSelect" name="is_hot" class="form-control">
                            <option value="0">普通</option>
                            <option value="1">热销</option>
                        </select>
                    </div>
                </div>
                <br><br>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" >类别（不可更改）</label>
                    <div class="col-sm-4">
                        <label class="form-control">实体</label>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_password" style="color: red">类型</label>
                    <div class="col-sm-4">
                        <select name="tid" class="form-control">
                        {foreach from=$types item="foo"}
                            <option value="{$foo->id}">{$foo->name}</option>
                        {/foreach}
                        </select>
                    </div>
                </div>
            </fieldset>
            <br><br>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" style="color: red">商品说明描述</label>
                    <div class="col-sm-4">
                        <textarea name="describe" id="" cols="50" rows="10" required></textarea>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend style="color: red">上传封面图片</legend>
                <h5>提示：如果不上传默认使用原商品封面图片，如果上传则替换封面图片为上传的图片</h5>
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
                        <div id="imgdiv"><img id="imgShow" width="300" /></div>
                    </div>
                </div>
            </fieldset>
    </form>
    </div>
{/block}