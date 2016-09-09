{extends file='admin\public.tpl'}
{block name=content}
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <h3 class="panel-heading text-center text-big">实体分类</h3>
                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">序号</th>
                        <th class="text-center">实体</th>
                        <th class="text-center">状态</th>
                        <th class="text-center">操作</th>
                    </tr>       
                    </thead>
                    <tbody>
                    {if $entity}
                    {foreach $entity as $v}
                    <tr class="text-center">
                        <th scope="row" class="text-center">{$v->num}</th>
                        <td>{$v->name}</td>
                        {if $v->status==1}
                        <td>可用</td>
                        {else}
                        <td>禁用</td>
                        {/if}
                        <td><a class="btn btn-primary btn-sm" href="type_update/{$v->id}">更改</a>&nbsp;|&nbsp;<a class="btn btn-danger btn-sm" href="del/{$v->id}">删除</a></td>
                    </tr>
                    {/foreach}
                    {else}
                    <tr class="text-center">
                        <td colspan="3">没有分类</td>
                    </tr>
                    {/if}
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-md-5">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <h3 class="panel-heading text-center">虚拟分类</h3>

                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">序号</th>
                        <th class="text-center">虚拟</th>
                        <th class="text-center">状态</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $virtual}
                    {foreach $virtual as $v}
                    <tr class="text-center">
                        <th scope="row" class="text-center">{$v->num}</th>
                        <td>{$v->name}</td>
                        {if $v->status==1}
                        <td>可用</td>
                        {else}
                        <td>禁用</td>
                        {/if}
                        <td><a class="btn btn-primary btn-sm" href="type_update/{$v->id}">更改</a>&nbsp;|&nbsp;<a class="btn btn-danger btn-sm" href="del/{$v->id}">删除</a></td>
                    </tr>
                    {/foreach}
                    {else}
                    <tr class="text-center">
                        <td colspan="3">没有分类</td>
                    </tr>
                    {/if}
                    </tbody>
                </table>

            </div>
        </div>

    </div>



{/block}