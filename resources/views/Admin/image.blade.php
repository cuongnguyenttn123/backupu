@extends('Admin.Layout.dashboard')
@section('head')
    <style>
        select{
            border: 0;
            width: 100%;
        }
    </style>
@stop

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">User Table</h4>
                    {{--<p class="card-category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                No
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                User Email
                            </th>
                            <th>
                                Challenge
                            </th>
                            <th>
                                Votes
                            </th>
                            <th>
                                View Count
                            </th>
                            <th>
                                Like Count
                            </th>
                            <th>
                                Achievement
                            </th>
                            <th>
                                Categories
                            </th>
                            <th>
                                State
                            </th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($data);$i++)
                                @php
                                    $item = json_decode(json_encode($data[$i]), true);
                                @endphp
                                <tr>
                                    <td>
                                        {{$i+1}}
                                    </td>

                                    <td>
                                        {{$item['name']}}
                                    </td>

                                    <td>
                                        {{$item['u-id']}}
                                    </td>

                                    <td>
                                        {{$item['c-id']}}
                                    </td>
                                    <td>

                                        {{$item['vote']}}
                                    </td>
                                    <td>
                                        {{$item['view']}}
                                    </td>
                                    <td>
                                        {{$item['like']}}
                                    </td>
                                    <td>
                                        {{$item['achievement']}}
                                    </td>
                                    <td>
                                        {{$item['category-ids']}}
                                    </td>

                                    <td>
                                        <select id="s{{$i}}" onchange="selectitem('{{$item['email']}}',this,'s'+'{{$i}}')"  class="custom-select" style="
                                                @php
                                            switch ($item['permission']){
                                                case '0':
                                                    echo "color:yellow";
                                                    break;
                                                case '1':
                                                    echo "color:blue";
                                                    break;
                                                default:
                                                    echo "color:red";
                                                    break;
                                                                                    }
                                        @endphp">
                                            <option  @php if($item['permission']==0) echo "selected";@endphp value="0">New</option>
                                            <option  @php if($item['permission']==1) echo "selected";@endphp value="1">Agree</option>
                                            <option  @php if($item['permission']==2) echo "selected";@endphp value="2">Delete</option>
                                        </select>
                                        {{--                                        {{$item['permission']}}--}}
                                    </td>
                                    {{--<td class="text-primary">--}}
                                    {{--$36,738--}}
                                    {{--</td>--}}
                                </tr>
                            @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        function selectitem(item, selectObject,id){
            //alert(id);

            //var selectedCountry = $(this).children("option:selected").val();
            //alert(id+" ->" + selectedCountry);
            var value = selectObject.value;
            alert(item +"->" +value);
            switch (value) {
                case '0':
                    $('#'+id).css("color","yellow");
                    break;
                case '1':
                    $('#'+id).css("color","blue");
                    break;
                default:
                    $('#'+id).css("color","red");
                    break;
            }


        }

    </script>
@stop
