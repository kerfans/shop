{extends file='admin\public.tpl'}
{block name=content}
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">广告轮播图</div>
        
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>序号</th>
                <th>标题</th>
                <th>链接地址</th>
                <th>图片</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach $adinfo as $v}
            <tr>
                <th scope="row">{$v->num}</th>
                <td>{$v->title}</td>
                <td><a href="{$v->url}">{$v->url}</a></td>
                <td>{$v->picture}</td>
                {if $v->status eq 1}
                <td>可用</td>
                {else}
                <td>禁用</td>
                {/if}
                <td><a class="btn btn-sm btn-primary" href="ad_update/{$v->id}">编辑</a>|
                    <a class="btn btn-sm btn-danger del" href="ad_del/{$v->id}">删除</a>
                </td>
            </tr>
            {/foreach}
            </tbody>
        </table>
        <script>
            $(function()
            {
                $('.del').on('click',function(){  
                    var msg = "您真的确定要删除吗？不能恢复！"; 
                    if (confirm(msg)==true){ 
                        return true; 
                    }else{ 
                        return false; 
                    } 
                });            
            });           
        </script>
    </div>
{/block}