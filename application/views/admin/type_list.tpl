{extends file='admin\public.tpl'}
{block name=content}
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">实体分类</div>
                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>实体</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>       
                    </thead>
                    <tbody>
                    {if $entity}
                    {foreach $entity as $v}
                    <tr>
                        <th scope="row">{$v->num}</th>
                        <td>{$v->name}</td>
                        {if $v->status==1}
                        <td>可用</td>
                        {else}
                        <td>禁用</td>
                        {/if}
                        <td><a href="type_update/{$v->id}">更改</a>&nbsp;|&nbsp;<a href="del/{$v->id}">删除</a></td>
                    </tr>
                    {/foreach}
                    {else}
                    <tr>
                        <td colspan="3">没有分类</td>
                    </tr>
                    {/if}
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">虚拟分类</div>

                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>虚拟</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $virtual}
                    {foreach $virtual as $v}
                    <tr>
                        <th scope="row">{$v->num}</th>
                        <td>{$v->name}</td>
                        {if $v->status==1}
                        <td>可用</td>
                        {else}
                        <td>禁用</td>
                        {/if}
                        <td><a href="type_update/{$v->id}">更改</a>&nbsp;|&nbsp;<a href="del/{$v->id}">删除</a></td>
                    </tr>
                    {/foreach}
                    {else}
                    <tr>
                        <td colspan="3">没有分类</td>
                    </tr>
                    {/if}
                    </tbody>
                </table>

            </div>
        </div>

    </div>



{/block}