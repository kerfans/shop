{extends file='admin\public.tpl'}
{block name=content}
    <div class="col-lg-10">
        <div class="form-horizontal" role="form" >
        <fieldset>
            <legend>代金券详情</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label">代金券ID</label>
                <div class="col-sm-4">
                    <label class="form-control">{$data['type_id']}</label>
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
                    {if {$data['send_type']} eq 2}
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


        <form role="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="disabledSelect">标题名称</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">选择运营部</label>
                    <select id="disabledSelect" name="" class="form-control">
                        <option value="">移动</option>
                        <option value="">联通</option>
                        <option value="">电信</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="disabledSelect">输入流量大小</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">上传图片</label>
                    <input  type="file" name="">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">提交</button>
            </fieldset>
        </form>
    </div>
{/block}