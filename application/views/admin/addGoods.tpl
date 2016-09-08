{extends file='admin\public.tpl'}
{block name=content}
    {if validation_errors()}
        <div class="alert alert-danger">
            <strong>{form_error('content')}</strong>
        </div>
    {/if}
    <div class="row">
        <div class="col-lg-8">
            <form role="form" action="" method="post">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select type="button" name="type" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <option value="0">根据商品ID查询</option>
                            <option value="1">根据商品名称查询</option>
                        </select>
                    </div><!-- /btn-group -->
                    <input type="text" name="content" class="form-control" aria-label="..." placeholder="请输入代金券ID或名称" required>
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">搜索</button>
                  </span>
                </div><!-- /input-group -->
            </form>

        </div><!-- /.col-lg-6 -->
    </div>
    <br>
    <!-- /.row -->
    {*表单展示*}
    <div class="panel panel-default">
        <!-- Table -->
        {if $data}
        <table class="table">
            <thead>
            <tr>
                <th>商品ID</th>
                <th>商品名称</th>
                <th>市场价格</th>
                <th>门店ID</th>
                <th>商品库存</th>
                <th>商品类型</th>
                <th>是否上架</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$data item=foo}
                <tr>
                    <td>{$foo['goods_id']}</td>
                    <td>{$foo['goods_name']}</td>
                    <td>{$foo['market_price']}</td>
                    <td>{$foo['shop_id']}</td>
                    <td>{$foo['goods_number']}</td>
                    {if $foo['prescription_type'] eq 0}
                        <td>处方药</td>
                    {elseif $foo['prescription_type'] eq 1}
                        <td>非处方药</td>
                    {else}
                        <td>非药品</td>
                    {/if}
                    {if $foo['is_on_sale'] eq 0}
                        <td>下架中</td>
                    {else}
                        <td>上架中</td>
                    {/if}
                    <td>
                        <a class="btn btn-sm btn-success" href="/index.php/admin/addGoods/edit_goods/{$foo['goods_id']}">编辑并添加</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
            {else}
            <span style="font-size: 20px;color: #CC0000;">Ｓòrγy，没有查询到数据</span>
            {/if}
        </table>
    </div>
{/block}