{extends file='admin\public.tpl'}
{block name=content}
    {if validation_errors()}
        <div class="alert alert-danger">
            <strong>{form_error('content')}</strong>
        </div>
    {/if}
    <div class="row">
        <div class="col-lg-8">
            <form role="form" action="/index.php/admin/addCash" method="post">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select type="button" name="type" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <option value="0">根据代金券ID查询</option>
                            <option value="1">根据代金券名称查询</option>
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
                <th>代金券ID</th>
                <th>代金券名称</th>
                <th>代金券金额</th>
                <th>代金券类型</th>
                <th>开始使用时间</th>
                <th>截止使用时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                {foreach from=$data item=foo}
                    <tr>
                        <td style="line-height: 30px">{$foo['type_id']}</td>
                        <td style="line-height: 30px">{$foo['type_name']}</td>
                        <td style="line-height: 30px">{$foo['type_money']}</td>
                    {if {$foo['send_type']} eq '2'}
                        <td style="line-height: 30px">全场卷</td>
                    {else}
                        <td style="line-height: 30px">单品卷</td>
                    {/if}
                        <td style="line-height: 30px">{$foo['use_start_date']|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                        <td style="line-height: 30px">{$foo['use_end_date']|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                        <td style="line-height: 30px">
                            {if $foo['id']}
                            <a class="btn btn-sm btn-warning" href="#">已添加</a>
                            {else}
                            <a class="btn btn-sm btn-success" href="/index.php/admin/addCash/edit_cash/{$foo['type_id']}">编辑并添加</a>
                            {/if}
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