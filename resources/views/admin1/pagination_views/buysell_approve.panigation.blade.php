<table id="table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th scope="col">No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" >Title</th>
                                        <th scope="col">vote</th>
                                        <th scope="col">like</th>
                                        <th scope="col">report</th>
                                        <th scope="col">upload_date</th>
                                 
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<count($imgs);$i++)
                                            @php
                                                $item = json_decode(json_encode($imgs[$i]), true);
                                            @endphp
                                            <tr>
                                                <td></td>
                                                <td>
                                                    {{$i+1}}
                                                </td>
                                                <td>
                                                    <img src="{{$item['url']}}" style="width: 150px;" />
                                                </td>
                                                <td>
                                                    {{$item['imgname']}}
                                                </td>    
            
                                                <td>
                                                    {{$item['vote']}}
                                                </td>
                                                <td>
                                                    {{$item['like']}}
                                                </td>
                                                <td>
                                                    {{$item['report']}}
                                                </td>
                                                <td>
                                                    {{$item['upload_date']}}
                                                </td>
                                                <td>
                                                    <select id="s{{$i}}" onchange="selectitem('{{$item['id']}}',this,'s'+'{{$i}}')"  class="custom-select" style="
                                                            @php
                                                        switch ($item['state']){
                                                            case 'request':
                                                                echo "color:black;";
                                                                break;
                                                            case 'NULL':
                                                                echo "color:blue";
                                                                break;
                                                            case '1':
                                                                echo "color:green";
                                                                break;
                                                            case '2':
                                                                echo "color:red";
                                                                break;
                                                            default:
                                                                echo "color:red";
                                                                break;
                                                                                                }
                                                    @endphp">
                                                        <option  @php if($item['state']=='NULL') echo "selected";@endphp value="2">Pending</option>
                                                        <option  @php if($item['state']=='1') echo "selected";@endphp value="2">Accepted</option>
                                                        <option  @php if($item['state']=='2') echo "selected";@endphp value="3">Reject</option>
                                                        <option  @php if($item['state']=='delete') echo "selected";@endphp value="4">Delete</option> 
                                                    </select>
                                                    
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                {{$imgs->links()}}