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
        <h1 class="text-center" style="color: red">原代金券数据详情</h1>
        <div class="form-horizontal" role="form" >
        <fieldset>
            <legend>代金券详情</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label">代金券ID</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['type_id']}</label>
                    <input  type="hidden" name="pid" value="{$data['type_id']}">
                </div>
                <label class="col-sm-2 control-label" >代金券名称</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['type_name']}</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ds_username">代金券金额</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['type_money']}</label>
                </div>
                <label class="col-sm-2 control-label" for="ds_password">代金券类型</label>
                <div class="col-sm-4">
                    {if $data['send_type'] eq 2}
                        <label class="form-control">全场卷</label>
                    {else}
                        <label class="form-control">单品卷</label>
                    {/if}
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>使用规则</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label">开始使用时间</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['use_start_date']|date_format:"%Y-%m-%d %H:%M:%S"}</label>
                </div>
                <label class="col-sm-2 control-label" >截止使用时间</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['use_end_date']|date_format:"%Y-%m-%d %H:%M:%S"}</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ds_username">最小使用金额</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['min_goods_amount']}</label>
                </div>
                <label class="col-sm-2 control-label" for="ds_username">有效期类型</label>
                <div class="col-sm-4">
                    {if $data['expire_type'] eq 0}
                        <label class="form-control">自发放之日起90天有效</label>
                    {elseif $data['expire_type'] eq 1}
                        <label class="form-control">自发放之日起30天有效</label>
                    {elseif $data['expire_type'] eq 2}
                        <label class="form-control">截止使用时间为止</label>
                    {/if}
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>其他信息</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label">具体类型</label>
                <div class="col-sm-4">
                    {if $data['mod_type'] eq 0}
                        <label class="form-control">普通卷</label>
                    {elseif $data['mod_type'] eq 1}
                        <label class="form-control">红杏叶券</label>
                    {elseif $data['mod_type'] eq 2}
                        <label class="form-control">红杏叶券</label>
                    {/if}
                </div>
                <label class="col-sm-2 control-label" >具体类型</label>
                <div class="col-sm-4">
                    {if $data['prescription_type'] eq 0}
                        <label class="form-control">现金券</label>
                    {elseif $data['prescription_type'] eq 1}
                        <label class="form-control">非处方药</label>
                    {elseif $data['prescription_type'] eq 2}
                        <label class="form-control">其他非药品</label>
                    {/if}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ds_username">具体类型</label>
                <div class="col-sm-4">
                    {if {$data['is_all']} eq 0}
                        <label class="form-control">分厂券</label>
                    {else}
                        <label class="form-control">全场卷</label>
                    {/if}
                </div>
                <label class="col-sm-2 control-label" for="ds_username">具体类型</label>
                <div class="col-sm-4">
                    {if $data['dealer_id'] eq 0}
                        <label class="form-control">全场</label>
                    {else}
                        <label class="form-control">全场</label>
                    {/if}
                </div>
            </div>
        </fieldset>
        </div>
        <h1 class="text-center" style="color: red">自定义区域</h1><br><br>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_host" style="color: red">货架显示名称<br>（默认和原名一致）</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="ds_host" name="title" type="text" value="{$data['type_name']}" placeholder="请填入货架显示名称"/>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_name" style="color: red">代金券数量<br>(初始默认100)</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="ds_name" name="stock_num" type="text" value="100" placeholder="请输入代金券数量"/>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" style="color: red">兑换需要积分<br>(初始默认50W)</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" value="500000" name="cost_points" placeholder="请输入兑换需求积分"/>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_password" style="color: red">权重<br>(越大越靠前)</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="sort" value="0" placeholder="请输入权重（越大越靠前显示）"/>
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
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" style="color: red">类别（不可更改）</label>
                    <div class="col-sm-4">
                            <label class="form-control">虚拟</label>
                    </div>
                    <label class="col-sm-2 control-label" for="ds_password" style="color: red">类型（不可更改）</label>
                    <div class="col-sm-4">
                            <label class="form-control">代金券</label>
                    </div>
                </div>
            </fieldset>
            <br><br>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ds_username" style="color: red">代金券说明描述</label>
                    <div class="col-sm-4">
                        <textarea name="describe" id="" cols="50" rows="10"></textarea>
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
                        <div id="imgdiv"><img id="imgShow" width="300" /></div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
{/block}