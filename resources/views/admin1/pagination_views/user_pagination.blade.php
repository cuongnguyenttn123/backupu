  <table class="table table-striped" id="usersDataTable"   >
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" ></th>
                                        <th scope="col">No</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Votes</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Verification</th>
                                        <th scope="col">Wallet</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" class="noExl">Permission</th>
                                        <th scope="col" class="noExl">Post Appproval</th>
                                        <th scope="col" class="noExl">Profile Settings</th>
                                        <th scope="col">Register Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counts=count($admins);
                                    @endphp
                                    @for($i=0;$i<$counts;$i++)
                                        <tr>
                                            <td><input type="checkbox" id="periph1" name="user_id" value="{{$admins[$i]->no}}"></td>
                                            <td>{{$i+1}}</td>
                                            <td class="user-no">{{$admins[$i]->no}}</td>
                                            <td>{{$admins[$i]->name}}</td>
                                            <td>{{$admins[$i]->email}}</td>
                                            <td>{{$admins[$i]->country}}</td>
                                            <td>{{@$admins[$i]->userpix->voted}}</td>
                                           <td>{{$admins[$i]->city}}</td>
                                           <td>{{$admins[$i]->vc}}</td>
                                           <td>{{@$admins[$i]->userpix->walet}}</td>
                                            <td>{{$admins[$i]->pass}}</td>
                                            <td>{{$admins[$i]->mobilenum}}</td>
                                        <td>{{$admins[$i]->role}}</td>
                                    <td class="noExl">
                                        <select id="s-{{$i}}" onchange="selectitem('{{$admins[$i]->email}}',this,'s-'+'{{$i}}')" style="
                                                 @php
                                                    switch ($admins[$i]->permission){
                                                        case '0':
                                                           echo "color:#ff0000";
                                                            break;
                                                        case '1':
                                                            echo "color:#0000cc";
                                                            break;
                                                        case '2':
                                                            echo "color:#0000cc";
                                                            break;
                                                        default:
                                                            echo "color:#ff0000";
                                                            break;}
                                                @endphp">
                                            <option  @php if($admins[$i]->permission == 1) echo "selected";@endphp value="1">Approved</option>
                                            <option  @php if($admins[$i]->permission ==0) echo "selected";@endphp value="0">Block</option>
                                  
                                        </select>
                                    </td>
                                     <td class="noExl">
                                        <select id="ap-{{$i}}" onchange="changePostApproval('{{$admins[$i]->no}}',this,'ap-'+'{{$i}}')" style="
                                                 @php
                                                    switch ($admins[$i]->post_approval){
                                                        case '0':
                                                           echo "color:#ff0000";
                                                            break;
                                                        case '1':
                                                            echo "color:#0000cc";
                                                            break;
                                                        case '2':
                                                            echo "color:#0000cc";
                                                            break;
                                                        default:
                                                            echo "color:#ff0000";
                                                            break;}
                                                @endphp">
                                            <option  @php if($admins[$i]->post_approval == 1) echo "selected";@endphp value="1">Auto</option>
                                            <option  @php if($admins[$i]->post_approval ==0) echo "selected";@endphp value="0">Manual</option>
                                    
                                        </select>
                                    </td>
                                    <td class="datatable-ct actions noExl">
                                        <button id="edit-{{$i}}" onclick="edit_admin(this.id)" title="Edit" class="pd-setting-ed">
                                            <i class="fa fa-edit" style=""></i>Edit
                                            <p class="id" style="display: none;">{{$admins[$i]->no}}</p>
                                            <p class="name" style="display: none;">{{$admins[$i]->name}}</p>
                                            <p class="email" style="display: none;">{{$admins[$i]->email}}</p>
                                            <p class="country" style="display: none;">{{$admins[$i]->country}}</p>
                                            <p class="city" style="display: none;">{{$admins[$i]->city}}</p>
                                            <p class="voted" style="display: none;">{{@$admins[$i]->userpix->voted}}</p>
                                            <p class="password" style="display: none;">{{$admins[$i]->pass}}</p>
                                                                                        <p class="verification" style="display: none;">{{$admins[$i]->vc}}</p>
                                            <p class="mobile" style="display: none;">{{$admins[$i]->mobilenum
                                            }}</p>
                                            <p class="wallet" style="display: none;">{{@$admins[$i]->userpix->walet
                                            }}</p>
                                            <p class="flip" style="display: none;">{{@$admins[$i]->userpix->Flip}}</p>
                                            <p class="wand" style="display: none;">{{@$admins[$i]->userpix->Wand
                                            }}</p>
                                            <p class="charge" style="display: none;">{{@$admins[$i]->userpix->Charge
                                            }}</p>
                                            <p class="votes" style="display: none;">{{@$admins[$i]->userpix->Points
                                            }}</p>
                                        </button>
                                        <button id="transfer-{{$i}}" onclick="edit_transfer(this.id)" title="Edit" class="pd-setting-ed">
                                            Transfer
                                            <p class="id" style="display: none;">{{$admins[$i]->no}}</p></button>
                                      
                                        <a href="#" id="view-{{$admins[$i]->no}}" onclick="viewadmin(this.id)" data-toggle="modal" style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;" data-target="#quick-view" title="Quick View">
                                            <i class="fa fa-eye"></i>View
                                            <p class="id" style="display: none;">{{$admins[$i]->no}}</p>
                                            <p class="name" style="display: none;">{{$admins[$i]->name}}</p>
                                            <p class="email" style="display: none;">{{$admins[$i]->email}}</p>
                                            <p class="country" style="display: none;">{{$admins[$i]->country}}</p>
                                            <p class="city" style="display: none;">{{$admins[$i]->city}}</p>
                                            <p class="voted" style="display: none;">{{@$admins[$i]->userpix->voted}}</p>
                                            <p class="age" style="display: none;">{{$admins[$i]->age}}</p>
                                            <p class="password" style="display: none;">{{$admins[$i]->pass}}</p>
                                                                                        <p class="verification" style="display: none;">{{$admins[$i]->vc}}</p>
                                            <p class="mobile" style="display: none;">{{$admins[$i]->mobilenum
                                            }}</p>
                                            <p class="wallet" style="display: none;">{{@$admins[$i]->userpix->walet
                                            }}</p>
                                            <p class="flip" style="display: none;">{{@$admins[$i]->userpix->Flip
                                            }}</p>
                                            <p class="wand" style="display: none;">{{@$admins[$i]->userpix->Wand
                                            }}</p>
                                            <p class="charge" style="display: none;">{{@$admins[$i]->userpix->Charge
                                            }}</p>
                                            <p class="votes" style="display: none;">{{@$admins[$i]->userpix->Points
                                            }}</p>
                                        </a>
                                        <div style="padding-top:10px">
                                            <a href="{{route('send.email',$admins[$i]->no)}}"  style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;"  title="Send Email">
                                          Send Email
                                        </a>
                                        
                                        <a href="https://api.whatsapp.com/send?phone={{$admins[$i]->mobilenum}}"
                                                                       target="_blank" style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;">
                                                        
                                                                           WhatsAapp
                                                                    </a>
                                        </div>
                                    </td>
                                    <td>{{$admins[$i]->register_date}}</td>
                                    </tr>
                                    
                                    @endfor
                                    </tbody>
                                </table>
                                {{$admins->links()}}