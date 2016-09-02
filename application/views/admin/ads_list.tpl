{extends file='admin\public.tpl'}
{block name=content}
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">广告轮播图</div>
        <div class="panel-body">
            <p>可以进行设置操作。</p>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>链接地址</th>
                <th>图片</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a class="btn btn-sm btn-primary" href="#">编辑</a>|
                    <a class="btn btn-sm btn-danger" href="#">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
{/block}