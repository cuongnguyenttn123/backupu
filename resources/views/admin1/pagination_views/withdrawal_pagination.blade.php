<table id="table"  class="table table-striped" >
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" ></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Before</th>
                                        <th scope="col">After</th>

                                        <th scope="col">Paypal ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Pay</th>
                                        <th scope="col">Remark</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$num;$i++)

                                            <tr>
                                                <td><input type="checkbox" id="periph1" name="user_id" value="{{$withdraw[$i]->id}}"></td>
                                                <td>
                                                  {{$withdraw[$i]->id}}
                                                </td>

                                                <td>
                                                   {{$withdraw[$i]->username}}

                                                </td>

                                                <td>

                                                  {{$withdraw[$i]->amount}}
                                                </td>

                                                <td>
                                                  {{$withdraw[$i]->method}}
                                                </td>
                                                <td>
                                                 {{$withdraw[$i]->before}}
                                                </td>
                                                <td>
                                                {{$withdraw[$i]->after}}
                                                </td>
                                                <td>
                                                    {{$withdraw[$i]->account}}
                                                </td>
                                                <td>
                                                    {{$withdraw[$i]->description}}
                                                </td>
                                                <td>
                                                    <textarea id="{{$withdraw[$i]->id}}" onchange="selectitem1('{{$withdraw[$i]->id}}',this)" style="width:200px;height:60px;" value="">
                                                        {{$withdraw[$i]->note}}
                                                    </textarea>
                                                </td>
                                                <td>
                                                  <a href="https://www.paypal.com/login" target="_blank">
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                </td>

                                                  <td>
                                                            <div class="dropdown" style="position:relative">{{$withdraw[$i]->remark}}
                                                                <div class="dropdown-content" >
                                                                    <!--<a href= "{{url('admin/withdraw_process0/'.$withdraw[$i]->id.'/Success')}}">Success</a>-->
                                        <a style="cursor: pointer;" onclick="selectitem2('{{$withdraw[$i]->id}}', 'Success')">Success</a>               
                                        <a style="cursor: pointer;" onclick="selectitem2('{{$withdraw[$i]->id}}', 'Cancel')">Cancel</a>
                                        <a style="cursor: pointer;" onclick="selectitem2('{{$withdraw[$i]->id}}', 'Delete')">Delete</a>                                        
                                                                </div>
                                                            </div>
                                                        </td>
                                                                                <td>{{$withdraw[$i]->date}}
                                                </td>

                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                {{$withdraw->links()}}