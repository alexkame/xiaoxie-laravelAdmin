@extends('layouts.app')

@section('content')
    <div class="box">

        <div class="box-header">

            <div class="btn-group" >
                <a href="/admin/sys/create" class="btn btn-sm btn-primary add-btn"> <i class="fa fa-save"></i>&nbsp;&nbsp;新增配置 </a>
            </div>

            <div class="box-tools">
                <form class="form-group" action="/admin/sys/index" method="post" data-pjax="">
                    <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                        {{csrf_field()}}
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default sreachs"><i class="fa fa-search"></i></button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" >
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>配置键</th>
                    <th>值</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($lists))
                    @foreach($lists as $list)
                        <tr role="row" @if($loop->iteration %2 ==0) class="old" @else class="even" @endif>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$list->keys}}</td>
                            <td>{{$list->values}}</td>

                            <td>{{$list->created_at}}</td>
                            <td>{{$list->updated_at}}</td>

                            <td>
                                <a style="margin:3px;" href="/admin/role/{{$list->id}}/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                <a style="margin:3px;" href="javascript:void(0)" data-url="{{url('admin/role/'.$list->id.'/delete')}}" data-content="确认删除管理组？" data-param="{{$list->id}}" data-title="删除管理组" class="delBtn X-Small btn-xs text-danger delete-btn"><i class="fa fa-times-circle"></i> 删除</a>
                            </td>
                        </tr>

                    @endforeach
                    <tr >
                        <td align="right" colspan="7" id="pagination">
                            {{$lists->links()}}
                        </td>
                    </tr>
                @endif
                <tr>

                </tr>
                </tbody>

            </table>

        </div>
    </div>

@endsection


